<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use App\Recepcion;
use App\Gestion;
use App\Area;
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
        //administrador
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
        $user->username = 'LeyderDA';
        $user->email = 'leyder.universidad@gmail.com';
        $user->password = Hash::make('12345678');
        $user->rol_id=1;
        $user->per_id=$persona->id;
        $user->save();

        //estudiantes administrativos
        $persona2=new Persona();
        $persona2->cedula='10965879568';
        $persona2->prinom='José';
        $persona2->segnom='Miguel';
        $persona2->priape='Perez';
        $persona2->segape='Saenz';
        $persona2->tel='3156894572';
        $persona2->direc='Cúcuta';
        $persona2->save();
        
        $user2 = new User();
        $user2->username = 'JosePZ';
        $user2->email = 'jose.perez.saenz@gmail.com';
        $user2->password = Hash::make('A3Unpo*codet0d1');
        $user2->rol_id=2;
        $user2->per_id=$persona2->id;
        $user2->save();
//------------------------------------
        $persona3=new Persona();
        $persona3->cedula='10857458965';
        $persona3->prinom='Camila';
        $persona3->segnom='Mariana';
        $persona3->priape='Bedoya';
        $persona3->segape='Durán';
        $persona3->tel='3145869785';
        $persona3->direc='Cúcuta';
        $persona3->save();

        $user3 = new User();
        $user3->username = 'CamilaBD';
        $user3->email = 'cami.bedoya@gmail.com';
        $user3->password = Hash::make('A3Unpo*codet0d2');
        $user3->rol_id=3;
        $user3->per_id=$persona3->id;
        $user3->save();
//------------------------------------
        $persona4=new Persona();
        $persona4->cedula='1069857496';
        $persona4->prinom='Julián';
        $persona4->segnom='Mateo';
        $persona4->priape='Ortíz';
        $persona4->segape='Medina';
        $persona4->tel='3114510694';
        $persona4->direc='Cúcuta';
        $persona4->save();
     
        $user4 = new User();
        $user4->username = 'JuliánOM';
        $user4->email = 'julianmateo@gmail.com';
        $user4->password = Hash::make('A3Unpo*codet0d3');
        $user4->rol_id=4;
        $user4->per_id=$persona4->id;
        $user4->save();
//------------------------------------
        $persona5=new Persona();
        $persona5->cedula='10965879568';
        $persona5->prinom='Milena';
        $persona5->segnom='Andrea';
        $persona5->priape='Perez';
        $persona5->segape='Cañas';
        $persona5->tel='3156458964';
        $persona5->direc='Cúcuta';
        $persona5->save();
        
        $user5 = new User();
        $user5->username = 'MilenaPC';
        $user5->email = 'milenaandrea@gmail.com';
        $user5->password = Hash::make('A3Unpo*codet0d4');
        $user5->rol_id=2;
        $user5->per_id=$persona5->id;
        $user5->save();

//------------------------------------
        $persona6=new Persona();
        $persona6->cedula='109753624589';
        $persona6->prinom='Luis';
        $persona6->segnom='Antonio';
        $persona6->priape='Medina';
        $persona6->segape='Cañizales';
        $persona6->tel='3186675572';
        $persona6->direc='Cúcuta';
        $persona6->save();
        
        $user6 = new User();
        $user6->username = 'LuisMC';
        $user6->email = 'luismc@gmail.com';
        $user6->password = Hash::make('A3Unpo*codet0d5');
        $user6->rol_id=2;
        $user6->per_id=$persona6->id;
        $user6->save();



      //abogados en formación

        $persona7=new Persona();
        $persona7->cedula='603784589';
        $persona7->prinom='Ramiro';
        $persona7->segnom='Samuel';
        $persona7->priape='Torres';
        $persona7->segape='Arrieta';
        $persona7->tel='3107986555';
        $persona7->direc='Bucaramanga';
        $persona7->save();
        
        $user7 = new User();
        $user7->username = 'RamiroTA';
        $user7->email = 'ramiro@gmail.com';
        $user7->password = Hash::make('E3Unpo*codet0d1');
        $user7->rol_id=3;
        $user7->per_id=$persona7->id;
        $user7->save();
        //------------------------------------
        $persona8=new Persona();
        $persona8->cedula='606547895';
        $persona8->prinom='Salomé';
        $persona8->segnom='Mildred';
        $persona8->priape='Díaz';
        $persona8->segape='Capacho';
        $persona8->tel='35079867859';
        $persona8->direc='Cúcuta';
        $persona8->save();
        
        $user8 = new User();
        $user8->username = 'SalomeDC';
        $user8->email = 'salome18@gmail.com';
        $user8->password = Hash::make('E3Unpo*codet0d2');
        $user8->rol_id=3;
        $user8->per_id=$persona8->id;
        $user8->save();
        //------------------------------------
        $persona9=new Persona();
        $persona9->cedula='1069875468';
        $persona9->prinom='Elisabeth';
        $persona9->segnom='Darianis';
        $persona9->priape='Contreras';
        $persona9->segape='Lopéz';
        $persona9->tel='3152639854';
        $persona9->direc='Cúcuta';
        $persona9->save();
        
        $user9 = new User();
        $user9->username = 'ElisabethCL';
        $user9->email = 'Elisabeth88@gmail.com';
        $user9->password = Hash::make('E3Unpo*codet0d3');
        $user9->rol_id=3;
        $user9->per_id=$persona9->id;
        $user9->save();
        
        //------------------------------------
        $persona10=new Persona();
        $persona10->cedula='1069854789';
        $persona10->prinom='Sharon';
        $persona10->segnom='Andreina';
        $persona10->priape='Beltran';
        $persona10->segape='Maestre';
        $persona10->tel='3107999584';
        $persona10->direc='AguaClara';
        $persona10->save();
        
        $user10 = new User();
        $user10->username = 'Sharon';
        $user10->email = 'Sharon11@gmail.com';
        $user10->password = Hash::make('E3Unpo*codet0d4');
        $user10->rol_id=3;
        $user10->per_id=$persona10->id;
        $user10->save();
        //------------------------------------
        $persona11=new Persona();
        $persona11->cedula='60344789';
        $persona11->prinom='Yeison';
        $persona11->segnom='José';
        $persona11->priape='Gomez';
        $persona11->segape='Balaguera';
        $persona11->tel='3145698564';
        $persona11->direc='El Zulia';
        $persona11->save();
        
        $user11 = new User();
        $user11->username = 'YeisonGB';
        $user11->email = 'Yeison99@gmail.com';
        $user11->password = Hash::make('E3Unpo*codet0d5');
        $user11->rol_id=3;
        $user11->per_id=$persona11->id;
        $user11->save();
        //------------------------------------


        //PROFESORES
        
        $persona12=new Persona();
        $persona12->cedula='1085964758';
        $persona12->prinom='Edgar';
        $persona12->segnom='Alexander';
        $persona12->priape='Campos';
        $persona12->segape='Mora';
        $persona12->tel='3145693876';
        $persona12->direc='Bogotá';
        $persona12->save();
        
        $user12 = new User();
        $user12->username = 'AlexCampos';
        $user12->email = 'alexcampos@gmail.com';
        $user12->password = Hash::make('D3Unpo*codet0d1');
        $user12->rol_id=4;
        $user12->per_id=$persona12->id;
        $user12->save();
        //------------------------------------
        $persona13=new Persona();
        $persona13->cedula='10645858789';
        $persona13->prinom='Camila';
        $persona13->segnom='Andrea';
        $persona13->priape='Vega';
        $persona13->segape='Contreras';
        $persona13->tel='312556988';
        $persona13->direc='Bogotá';
        $persona13->save();
        
        $user13 = new User();
        $user13->username = 'CamilaVC';
        $user13->email = 'Camila458@gmail.com';
        $user13->password = Hash::make('D3Unpo*codet0d2');
        $user13->rol_id=4;
        $user13->per_id=$persona13->id;
        $user13->save();
        //------------------------------------
        $persona14=new Persona();
        $persona14->cedula='10889965478';
        $persona14->prinom='Angie';
        $persona14->segnom='Patricia';
        $persona14->priape='Beltrán';
        $persona14->segape='Arrieta';
        $persona14->tel='311144859968';
        $persona14->direc='Bogotá';
        $persona14->save();
        
        $user14 = new User();
        $user14->username = 'AngieBA';
        $user14->email = 'Angie33@gmail.com';
        $user14->password = Hash::make('D3Unpo*codet0d3');
        $user14->rol_id=4;
        $user14->per_id=$persona14->id;
        $user14->save();
        //------------------------------------
        $persona15=new Persona();
        $persona15->cedula='60977838';
        $persona15->prinom='Eduardo';
        $persona15->segnom='Angel';
        $persona15->priape='Peñaloza';
        $persona15->segape='Suarez';
        $persona15->tel='3159996687';
        $persona15->direc='Cúcuta';
        $persona15->save();
        
        $user15 = new User();
        $user15->username = 'EduardoPS';
        $user15->email = 'Eduardo963@gmail.com';
        $user15->password = Hash::make('D3Unpo*codet0d4');
        $user15->rol_id=4;
        $user15->per_id=$persona15->id;
        $user15->save();
        //------------------------------------
        $persona16=new Persona();
        $persona16->cedula='609886677';
        $persona16->prinom='Luis';
        $persona16->segnom='Alexander';
        $persona16->priape='Peña';
        $persona16->segape='Carmona';
        $persona16->tel='3145693876';
        $persona16->direc='Bogotá';
        $persona16->save();
        
        $user16 = new User();
        $user16->username = 'LuisPC';
        $user16->email = 'Luis444@gmail.com';
        $user16->password = Hash::make('D3Unpo*codet0d5');
        $user16->rol_id=4;
        $user16->per_id=$persona16->id;
        $user16->save();
        //------------------------------------
    }

}
