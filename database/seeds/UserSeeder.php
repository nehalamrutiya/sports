<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Mitchel Fausto',
            'email'=>'mitchel@promactinfo.com',
            'password'=>Hash::make('P@ssw0rd'),
            'role_id'=>1,
            'remember_token'=>str_random(10)
        ]);
        User::create([
            'name' => 'Queen Jacobi',
            'email' => 'queen@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Magen Faye',
            'email' => 'magen@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Delicia Ledonne',
            'email' => 'delicia@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Camille Grantham',
            'email' => 'camille@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Marc Voth',
            'email' => 'marc@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Randy Randon',
            'email' => 'randy@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Delora Saville',
            'email' => 'delora@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Rosario Reuben',
            'email' => 'rosario@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
        User::create([
            'name' => 'Lula Uhlman',
            'email' => 'lula@promactinfo.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id'=> 2,
            'remember_token' => str_random(10)
        ]);
    }
}
