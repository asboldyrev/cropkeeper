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
		Schema::create('harvests', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->foreignUuid('plant_uuid')->constrained(column: 'uuid')->restrictOnDelete();
			$table->timestamp('harvested_at')->nullable();
			$table->unsignedSmallInteger('count')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('harvests');
	}
};
