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
		Schema::create('plants', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->string('name');
			$table->text('description')->nullable();
			$table->boolean('is_seedling')->index()->default(false);
			$table->boolean('is_transplanted')->index()->default(false);
			$table->timestamp('planted_at')->nullable();
			$table->timestamp('harvested_at')->nullable();
			$table->foreignUuid('seed_uuid')->constrained(column: 'uuid')->nullOnDelete();
			$table->foreignUuid('plot_uuid')->constrained(column: 'uuid')->cascadeOnDelete();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('plants');
	}
};
