<?php

use Illuminate\Database\Seeder;


class TiposCursillosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("tipos_cursillos")->delete();
        DB::table('tipos_cursillos')->insert(Array('tipo_cursillo' => 'Interno','color'=>'#990000'));
        DB::table('tipos_cursillos')->insert(Array('tipo_cursillo' => 'Externo','color'=>'#009900'));
    }

}