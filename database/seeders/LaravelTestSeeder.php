<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\LaravelTest;
use Illuminate\Support\Facades\DB;
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
        $csvData = fopen(storage_path('\BDD_03082022.csv'), 'r');
        $firstline = true; 
        $c=0;
        while (($data = fgetcsv($csvData,5000, "\n")) !== false) {
            if (!$firstline) {
                //
                $colones = explode(';',($data[0])); 
                //
                print_r($colones);

                $mv=doubleval(str_replace(',','.',$colones[2]));
                $long=doubleval(str_replace(',','.',$colones[7]));
                $larg=doubleval(str_replace(',','.',$colones[8]));
                $epai=doubleval(str_replace(',','.',$colones[9]));
                $vol=doubleval(str_replace(',','.',$colones[10]));
                
                //$cd_str=str_replace(' ','',$colones[11]);
                //$cd=intval($cd_str);
                
                DB::table('laraveltest')->insert( [
                    //'ref' => $data[0],
                    'detail_dechet' => $colones[1],
                    'masse_volumique' => $mv,
                    'cerfa' =>$colones[3],
                    'niv1' => $colones[4],
                    'niv2' => $colones[5],
                    'unité' => $colones[6],
                    'longeur' => $long,
                    'largeur' => $larg,
                    'epaisseur' => $epai,
                    'volume' => $vol,
                    'code_dechet' => $colones[11],
                    'lot' => $colones[12]
                ]);
                
                /*
                $c++;
                if($c==5){
                    break;
                }*/

            }
            $firstline = false;
        }
        fclose($csvData);
    }
}