<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeFile($folder, $file){
		$filename = rand(1, 99999999) . '.' . $file->getClientOriginalExtension();
		$file->move(public_path("uploaded_files/{$folder}"), $filename);
		return $filename;
	}
}
