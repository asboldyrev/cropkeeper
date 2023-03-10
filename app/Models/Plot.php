<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plot extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'name',
		'description',
		'polygon',
		'area',
		'ph',
	];

	protected $casts = [
		'area' => 'float',
		'ph' => 'float',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function garden():BelongsTo {
		return $this->belongsTo(Garden::class);
	}


	public function plantingMethod():BelongsTo {
		return $this->belongsTo(PlantingMethod::class);
	}


	public function plants():HasMany {
		return $this->hasMany(Plant::class);
	}
}
