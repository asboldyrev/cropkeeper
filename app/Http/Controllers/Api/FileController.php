<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileController
{
	public function upload(Request $request) {
		$names = [];
		/** @var UploadedFile $file */
		foreach($request->file('files', []) as $file) {
			$filename = $file->hashName();
			$names[] = $filename;
			// Storage::putFileAs('files', $file, $filename);
		}

		return response()->json($names);
	}
}
