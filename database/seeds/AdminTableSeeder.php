<?php

use Illuminate\Database\Seeder;

use Blog1\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //this sseder is used to setup the admin in the beginning
        $admin=new Admin();
        $admin->name = "admin";
        $admin->password = bcrypt("test_pw");
        $admin->save();   
    }
}
