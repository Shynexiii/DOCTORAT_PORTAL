<?php

namespace App\Http\Controllers\Backend\User;

use App\Role;
use App\User;
use App\Speciality;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->speciality_id != null) {
            $users = User::where('speciality_id','!=',null)->where('speciality_id',Auth::user()->speciality_id)->paginate(15);
        }else {
            $users = User::paginate(15);
        }

          
        //dd($users);
        /* $user = User::all()->find(1);   */
        /* dd($user->speciality); */
        
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $specialities = Speciality::all();

        return view('users.create',compact('roles','specialities'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request());
        request()->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['sometimes','email'],
            'password'      => ['required'],
            'phone_number'  => ['required'],
            'Date_Of_Birth' => ['required','date_format:d/m/Y'],
            'role'          => ['required'],
            'speciality'    => ['required'],
        ]);
        
        
        $data = array(
            'first_name'    => request()->first_name,
            'last_name'     => request()->last_name,
            'email'         => request()->email,
            'password'      => Hash::make(request()->password),
            'phone_number'  => request()->phone_number,
            'Date_Of_Birth' => request()->Date_Of_Birth,
            'plain_text'    => request()->password,

        );

        $user = User::create($data);
        $user->roles()->attach(request()->role);
        $user->username = strtolower(request()->first_name).".".$user->id;
        $user->speciality()->associate(request()->speciality);
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $roles = Role::all();
        $specialities = Speciality::all();
        //dd($user->speciality_id != null);
        return view('users.edit', compact('user','roles','specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        $a = request()->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['sometimes','email'],
            'password'      => ['required'],
            'phone_number'  => ['required'],
            'Date_Of_Birth' => ['required','date_format:d/m/Y'],
            'role'          => ['required'],
            'speciality'    => ['required'],

        ]);

        $data = array(
            'first_name'    => request()->first_name,
            'last_name'     => request()->last_name,
            'email'         => request()->email,
            'password'      => Hash::make(request()->password),
            'phone_number'  => request()->phone_number,
            'Date_Of_Birth' => request()->Date_Of_Birth,
            'plain_text'    => request()->password,

        );

        // $user = User::find($user->id);
        // dd($user);
        $user->update($data);
        $user->roles()->sync(request()->role);
        
        if ($user->speciality_id != null) {
            $user->username = strtolower(request()->first_name).".".$user->id;
        }
        $user->speciality()->associate(request()->speciality);
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();

        $user->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    // public function export() 
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
    
    // public function import() 
    // {
    //     dd(request());
    //     Excel::import(new UsersImport, request()->file('file'));
        
    //     return redirect('/')->with('success', 'All good!');
    // }
}
