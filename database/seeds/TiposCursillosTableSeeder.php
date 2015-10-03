<?php

use Illuminate\Database\Seeder;


class TiposCursillosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("tipos_cursillos")->delete();
        DB::table('tipos_cursillos')->insert(Array('cursillo' => 'Interno'));
        DB::table('tipos_cursillos')->insert(Array('cursillo' => 'Externo'));
    }

}