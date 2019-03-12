<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	function rand_dni(){
    	$num = rand(1000000, 99999999);
    	$letr = generate_string(1);

    	$dni = $num.$letr;

    	return $dni;
    }
 
	function generate_string($strength) {
		$input = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$input_length = strlen($input);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
	 
	    return $random_string;
	}


    	for ($i=0; $i < 30; $i++) { 

	        DB::table('clientes')->insert([
	            'nombre' => generate_string(15),
	            'email' => generate_string(10).'@test.com',
	            'telefono' => rand(100000000, 999999999),
	            'direccion' => generate_string(10),
	            'cifNif' => rand_dni(),
	            'provincia' => generate_string(10),
	            'localidad' => generate_string(10),
	            'codigoPostal' => rand(10000, 99999),
	            'created_at' => Carbon::create(rand(2000, 2018), rand(1, 12), rand(1, 12)),
	            'updated_at' => Carbon::create(rand(2000, 2018), rand(1, 12), rand(1, 12))
	        ]);
    	}

    	for ($i=0; $i < 30; $i++) { 

	        DB::table('ventas')->insert([
	            'idCliente' => rand(100, 120),
	            'created_at' => Carbon::create(rand(2000, 2018), rand(1, 12), rand(1, 12)),
	            'updated_at' => Carbon::create(rand(2000, 2018), rand(1, 12), rand(1, 12))
	        ]);
    	}
    }
    
}
