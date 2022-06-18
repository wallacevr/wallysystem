<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users[]=[
            'grupo_id'=> 2,
            'name'=>'Wallace',
            'email'=>'wallacevr@gmail.com',
            'password'=>Hash::make('123mudar'),
            

        ];
        DB::table('users')->insert($users);
    }
}
