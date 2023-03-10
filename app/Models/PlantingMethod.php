<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlantingMethod extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'name',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function plots():HasMany {
		return $this->hasMany(Plot::class);
	}
}
