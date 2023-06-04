<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearFilesDirectory extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'clear-files-directory';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Deletes old files';


	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$timestamp = now()->subMinutes(5)->timestamp;

		foreach(Storage::files('files') as $file) {
			if($timestamp > Storage::lastModified($file)) {
				Storage::delete($file);
				$this->info($file . ' is deleted');
			}
		}
	}
}
