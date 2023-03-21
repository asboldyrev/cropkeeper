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
		Schema::create('seeds', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->string('name');
			$table->string('manufacturer')->nullable();
			$table->text('description')->nullable();
			$table->date('bought_at')->nullable();
			$table->date('expiration_at')->nullable();
			$table->unsignedSmallInteger('count')->default(0);
			$table->enum('unit', [ 'quantity', 'grams' ])->default('grams');
			$table->foreignUuid('garden_uuid')->constrained( column: 'uuid')->cascadeOnDelete();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('seeds');
	}
};
