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
        $csvData = fopen(storage_path('\listeMat.csv'), 'r');
        $firstline = true; 
        $c=0;
        while (($data = fgetcsv($csvData,5000, "\n")) !== false) {
            if (!$firstline) {
                //
                $colones = explode(';',($data[0])); 
                //
                print_r($colones);

                $mv=floatval($colones[2]);
                $long=floatval($colones[7]);
                $larg=floatval($colones[8]);
                $epai=floatval($colones[9]);
                $vol=floatval($colones[10]);
                ///
                /*
                print_r($mv."\n");
                print_r($long."\n");
                print_r($larg."\n");
                print_r($epai."\n");
                print_r($vol."\n");
                */
                //
                $cd_str=str_replace(' ','',$colones[11]);
                $cd=intval($cd_str);
                
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
                    'code_dechet' => $cd,
                    'lot' => $colones[12]
                ]);
                /*
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
                */
                /*
                $c++;
                if($c==5){
                    break;
                }*/
                //print_r($data) ;
                //print_r($colones);
                //print_r($cd."\n");
                
                





            }
            $firstline = false;
        }
        fclose($csvData);
    }
}