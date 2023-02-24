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
		Schema::create('reminders', function (Blueprint $table) {
			$table->uuid()->primary();
			$table->string('title');
			$table->text('description')->nullable();
			$table->foreignUuid('user_uuid')->constrained(column: 'uuid')->cascadeOnDelete();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('reminders');
	}
};
