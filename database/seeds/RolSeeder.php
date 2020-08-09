<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Rol=new Rol();
        $Rol->nombre='SUPERADMIN';
        $Rol->save();

        $Rol2=new Rol();
        $Rol2->nombre='ADMINISTRATIVO';
        $Rol2->save();

        $Rol3=new Rol();
        $Rol3->nombre='ESTUDIANTE';
        $Rol3->save();

        $Rol4=new Rol();
        $Rol4->nombre='DOCENTE';
        $Rol4->save();
    }
}
