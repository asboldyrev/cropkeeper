<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'name',
		'description',
		'polygon',
		'area',
	];

	protected $primaryKey = 'uuid';

	protected $casts = [
		'area' => 'float',
	];
}
