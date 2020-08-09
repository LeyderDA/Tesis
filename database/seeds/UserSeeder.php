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
        $user->rol_id=1;
        $user->per_id=$persona->id;
        $user->save();


        $persona2=new Persona();
        $persona2->cedula='123';
        $persona2->prinom='Jose';
        $persona2->segnom='Miguel';
        $persona2->priape='Perez';
        $persona2->segape='Saenz';
        $persona2->tel='3156894572';
        $persona2->direc='Cucuta';
        $persona2->save();
        
        $user2 = new User();
        $user2->username = 'Joseito';
        $user2->email = 'joseito@gmail.com';
        $user2->password = Hash::make('123');
        $user2->rol_id=2;
        $user2->per_id=$persona2->id;
        $user2->save();

        $persona3=new Persona();
        $persona3->cedula='321';
        $persona3->prinom='Diomedez';
        $persona3->segnom='Dionisio';
        $persona3->priape='Diaz';
        $persona3->segape='Maestre';
        $persona3->tel='3507986584';
        $persona3->direc='Valledupar';
        $persona3->save();
        
        $user3 = new User();
        $user3->username = 'Cacique';
        $user3->email = 'cacique@gmail.com';
        $user3->password = Hash::make('321');
        $user3->rol_id=3;
        $user3->per_id=$persona3->id;
        $user3->save();


        $persona4=new Persona();
        $persona4->cedula='789';
        $persona4->prinom='Edgar';
        $persona4->segnom='Alexander';
        $persona4->priape='Campos';
        $persona4->segape='Mora';
        $persona4->tel='3145693876';
        $persona4->direc='Bogota';
        $persona4->save();
        
        $user4 = new User();
        $user4->username = 'AlexCampos';
        $user4->email = 'alex@gmail.com';
        $user4->password = Hash::make('789');
        $user4->rol_id=4;
        $user4->per_id=$persona4->id;
        $user4->save();
    }

}
