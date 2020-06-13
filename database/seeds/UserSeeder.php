<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona=new Persona();
        $persona->cedula='1093795680';
        $persona->prinom='Leyder';
        $persona->segnom='Luis';
        $persona->priape='Duran';
        $persona->segape='Arrieta';
        $persona->tel='3209444913';
        $persona->direc='Aguaclara';
        $persona->save();
        
        $user = new User();
        $user->username = 'Luiyi';
        $user->email = 'Leyder.universidad@gmail.com';
        $user->password = Hash::make('12345678');
        $user->per_id=$persona->id;
        $user->save();
    }
}
