<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plant extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'name',
		'description',
		'is_seedling',
		'is_transplanted',
		'planted_at',
		'harvested_at',
	];

	protected $casts = [
		'is_seedling' => 'boolean',
		'is_transplanted' => 'boolean',
		'planted_at' => 'datetime',
		'harvested_at' => 'datetime',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function seed():BelongsTo {
		return $this->belongsTo(Seed::class);
	}


	public function plot():BelongsTo {
		return $this->belongsTo(Plot::class);
	}
}
