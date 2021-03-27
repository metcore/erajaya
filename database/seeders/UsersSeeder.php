<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => "superadmin",
            'email' => 'superadmin@hello.world',
            'password' => Hash::make('superadmin'),
            'roles' => 'a:2:{s:4:"Home";a:4:{s:5:"index";s:1:"1";s:6:"create";s:1:"1";s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:4:"User";a:4:{s:5:"index";s:1:"1";s:6:"create";s:1:"1";s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}}'
        ]);

        User::factory()
        	->count(30)
        	->create();
    }
}
