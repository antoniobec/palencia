<?php

use Palencia\Entities\Cursillos;
use Faker\Generator;
use Carbon\Carbon;
class CursillosTableSeeder  extends BaseSeeder {

    public function getModel()
    {

        return new Cursillos();

    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        $fecha_inicio = Carbon::createFromDate(2015,1,1)->addMonth(rand(0,11))->addDay(rand(0,31));
        $fecha_final= Carbon::createFromDate($fecha_inicio->year,$fecha_inicio->month,$fecha_inicio->day)->addDay(rand(0,3));
        return [
            'cursillo'  => $faker->catchPhrase,
            'fecha_inicio' =>$fecha_inicio,
            'fecha_final' => $fecha_final,
            'descripcion'  => $faker->text($maxNbChars = 200),
            'comunidad_id'  => $this->getRandom('Comunidades')->id,
            'tipo_participante_id'  => rand(1,3),
            'tipo_cursillo_id'  => rand(1,2),
            'num_cursillo'=> rand(1111,9999)
        ];

    }



}