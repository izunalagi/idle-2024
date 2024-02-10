<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris =
            [
                'Himasif' => [
                    ['PPL', 'ppl'],
                    ['Game', 'game'],
                    ['Bisnis TIK', 'bisnis-tik'],
                    ['Smart City', 'smart-city']
                ],

                'Himatif' => [
                    ['UI/UX', 'uiux'],
                    ['IOT', 'iot']
                ],

                'Laos' => [
                    ['CPC', 'cpc'],
                    ['CTF', 'ctf']
                ]
            ];

        foreach($kategoris as $ormawa => $kategori){
            foreach($kategori as $k){
                DB::table('kategoris')->insert([
                    'id_ormawa' => \App\Ormawa::where('nama_ormawa' , $ormawa)->first()->id,
                    'nama_kategori' => $k[0],
                    'kategori' => $k[1],
                ]);
            }
        }
    }
}
