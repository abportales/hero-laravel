<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //establecemos el id a cero.
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //resetea el id de la tabla y borrar todos los registros
        DB::table('levels')->truncate();
        $xp = 0;

        for($i = 0; $i < 10; $i++){
            $xp = $xp * 1.2 + 50;
            DB::table('levels')->insert([
                'xp' => $xp,
            ]);
        }
    }
}
