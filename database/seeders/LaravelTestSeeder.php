<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\LaravelTest;
class LaravelTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LaravelTest::truncate(); 
        $csvData = fopen(storage_path('\listeMat.csv'), 'r');
        $firstline = true; 
        while (($data = fgetcsv($csvData,5000, ',')) !== false) {
            if (!$firstline) {
                LaravelTest::create([
                    'ref' => $data[0],
                    'detail_dechet' => $data[1],
                    'masse_volumique' => $data[2],
                    'cerfa' => $data[3],
                    'niv1' => $data[4],
                    'niv2' => $data[5],
                    'unité' => $data[6],
                    'longeur' => $data[7],
                    'largeur' => $data[8],
                    'epaisseur' => $data[9],
                    'volume' => $data[10],
                    'code_dechet' => $data[11],
                    'lot' => $data[12],
                ]);
            }
            $firstline = false;
        }
        fclose($csvData);
    }
}