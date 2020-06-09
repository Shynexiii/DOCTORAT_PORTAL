<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        
        $admin = User::create([
            'first_name'    =>  'Marc',
            'last_name'     =>  'Alan Rover',
            'username'      =>  'admin',
            'email'         =>  'admin@admin.com',
            'password'      =>  Hash::make('123456'),
            'phone_number'  =>  '+2136458512',
            'Date_Of_Birth' =>  '17/11/1983',
        ]);

        $coding = User::create([
            'first_name'    =>  'Paul',
            'last_name'     =>  'McCan',
            'username'      =>  'coding',
            'email'         =>  'coding@coding.com',
            'password'      =>  Hash::make('123456'),
            'phone_number'  =>  '+2136458512',
            'Date_Of_Birth' =>  '03/03/1993',
        ]);
        
        
        $secretariat = User::create([
            'first_name'    =>  'Isabel',
            'last_name'     =>  'Smith Richarson',
            'username'      =>  'secretariat',
            'email'         =>  'secretariat@secretariat.com',
            'password'      =>  Hash::make('123456'),
            'phone_number'  =>  '+2135647499',
            'Date_Of_Birth' =>  '02/02/1992',
        ]);

        
        $adminRole = Role::where('name','admin')->first();
        $codingRole = Role::where('name','coding')->first();
        $secretariatRole = Role::where('name','secretariat')->first();
        $secretariatRole1 = Role::where('name','secretariat')->first();
        
        $admin->roles()->attach($adminRole);
        $coding->roles()->attach($codingRole);
        $secretariat->roles()->attach($secretariatRole);


    }
}