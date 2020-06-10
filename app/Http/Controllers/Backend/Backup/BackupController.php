<?php

namespace App\Http\Controllers\Backend\Backup;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Backup\Helpers\Format;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Storage::allFiles('public/Laravel');
        //dd($files);

        $backup = [];
        foreach ($files as $file) {
            $backup[] = [
                'file_path'     => $file,
                'file_name'     => pathinfo($file)['filename'], 
                'file_date'     => date('d/m/Y H:i:s',Storage::lastModified($file)),
                'file_size'     => Format::humanReadableSize(Storage::size($file)),
                 
            ];
        }
        //dd($backup);
        return view('backup.index',compact('backup'));   
    }

    public function create()
    {
        try {
            // start the backup process
            Artisan::call('backup:run');
            $output = Artisan::output();
            // log the results
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            // return the results as a response to the ajax call
            Session::flash('success', 'New backup created');
            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    public function download(Request $request){
        
        return Storage::download($request->file_name);
    }    
    
}
