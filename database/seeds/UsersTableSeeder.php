<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'      => 'asera',
            'email'     => 'admin@app.com',
            'password'  => bcrypt(123456789),        
            'address'     => 'جنزور',
            'phone'     => '0911111111',
            'prive'     => 0,
            'halls_id'     => 0,
        ]);
    }
}
