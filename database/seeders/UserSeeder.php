<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		User::create([
			'login' => 'admin',
			'email' => 'admin@admin.ru',
			'password' => '000000',
			'first_name' => 'Администратор',
		]);
	}
}
