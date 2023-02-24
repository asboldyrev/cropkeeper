<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    use HasFactory, HasUuids;

	protected $fillable = [
		'name',
		'manufacturer',
		'description',
		'bought_at',
		'expiration_at',
		'count',
	];

	protected $casts = [
		'bought_at' => 'datetime',
		'expiration_at' => 'datetime',
		'count' => 'integer',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;
}
