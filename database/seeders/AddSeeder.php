<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('czas')->insert([
        'id_pracownika' => Str::random(8).'@wp.pl',
        'dzien' => Str::random(8).'@wp.pl',
        'godziny' => Str::random(8).'@wp.pl',
        'opis' => Str::random(8).'@wp.pl',

      ]);


    }
}
