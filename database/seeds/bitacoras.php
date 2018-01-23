<?php

use Illuminate\Database\Seeder;
use Faker\Factory as FF;
use DB as DB;

class bitacoras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FF::create();

        foreach (range(1,20) as $index) {
        	$movil = 416;
        	$movil .= $faker->randomNumber($nbDigits = 7, $strict = true);
        	$id_bita = $faker->unique()->numberBetween($min = 1000, $max = 9000); 

        	DB::table('bitacoras')->insert([
        		'id'		=>  $id_bita,
        		'user_id'   =>	1,	
		    	'ticket'	=>	$faker->numberBetween($min = 1000, $max = 9000),
		    	'ticketraiz'	=>	$faker->numberBetween($min = 1000, $max = 9000),
		    	'detectado'	=>	$faker->name,
		    	'telrepor'	=>	$movil,
		    	'responsable'	=>	1,
		    	'impacto'	=>	1,
		    	'reportado'	=>	1,
		    	'escalamiento'	=>	1,
		    	'estatus'	=>	1,
		    	'origen'	=>	$faker->text($maxNbChars = 200),
		    	'sintoma'	=>	$faker->text($maxNbChars = 200),
		    	'observacion'	=>	$faker->text($maxNbChars = 200),
		    	'created_at' => date("Y-m-d H:i:s"),
		    	'updated_at' => date("Y-m-d H:i:s")
		    ]);
		    DB::table('bita_unidad')->insert([    	
		    	'id_bita'		=>	$id_bita,
		    	'id_unidad'		=>	$faker->numberBetween($min = 1, $max = 7),		    	
		    	'created_at' => date("Y-m-d H:i:s"),
		    	'updated_at' => date("Y-m-d H:i:s")
		    ]);
		    DB::table('bita_eventos')->insert([    	
		    	'id_bita'	=>	$id_bita,
		    	'id_inci'	=>	$faker->numberBetween($min = 1, $max = 6),
		    	'id_evento'	=>	$faker->numberBetween($min = 1, $max = 126),
		    	'fec_detect' => date("Y-m-d H:i:s"),
		    	'fec_repor' => date("Y-m-d H:i:s"),
		    	'fec_initicket' => date("Y-m-d H:i:s"),
		    	'fec_culmina' => date("Y-m-d H:i:s"),
		    	'created_at' => date("Y-m-d H:i:s"),
		    	'updated_at' => date("Y-m-d H:i:s")
		    ]);
		    DB::table('certificacions')->insert([    	
		    	'id_bita'		=>	$id_bita,
		    	'certificado'	=>	"No",
		    	'certificado_por' => 1,
		    	'created_at' => date("Y-m-d H:i:s"),
		    	'updated_at' => date("Y-m-d H:i:s")
		    ]);
        }
    }
}
