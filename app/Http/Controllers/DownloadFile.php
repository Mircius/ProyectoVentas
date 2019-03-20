<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFile extends Controller
{
    
    public function downloadArchivo($nombre){
	      try{
	        $pathtoFile = public_path().'/storage/'.$nombre;
	        echo $pathtoFile;
	        return response()->download($pathtoFile);
	      }
	      catch(Exception $e) {
				return back()->withErrors(['Error1'=>'Error del servidor']);	
	      }
    }
}
