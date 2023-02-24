<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('plots', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->string('name')->nullable();
			$table->text('description')->nullable();
			$table->polygon('polygon')->nullable();
			$table->float('area')->nullable();
			// $table->uuid('garden_uuid')->unique();
			// $table->uuid('planting_method_uuid')->unique();
			$table->float('ph', 2, 1);
			$table->timestamps();

			$table->foreignUuid('garden_uuid')->constrained(column: 'uuid')->cascadeOnDelete();
			$table->foreignUuid('planting_method_uuid')->constrained('planting_methods', 'uuid')->cascadeOnDelete();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('plots');
	}
};
