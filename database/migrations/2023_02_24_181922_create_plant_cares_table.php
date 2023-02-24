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
		Schema::create('plant_cares', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->foreignUuid('plant_uuid')->constrained(column: 'uuid')->cascadeOnDelete();
			$table->string('action');
			$table->text('comment')->nullable();
			$table->timestamp('date')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('plant_cares');
	}
};
