<?php

use Illuminate\Database\Seeder;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
     //This is to create the first admin user
    public function run()
    {

      //date now
      $date = date('Ymd');
      $dateNow = date('Y-m-d H:i:s', strtotime($date) );

      $bornDate = "2000-06-15";
      $bornDate = date('Y-m-d H:i:s', strtotime($bornDate) );

      DB::table('users')->insert([
        'id'          => '1',
        'name'        => 'Admin',
        'username'    => 'admin',
        'email'       => 'admin@webmaster.com',
        'password'    => Hash::make('admin'),
        'tell'        => '0123456789',
        'birthday'    => $bornDate,
        'admin_right' => true,
        'modified'    => $dateNow,
        'created'     => $dateNow,

      ]);

    }
}
