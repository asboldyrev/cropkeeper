<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlantCare extends Model
{
    use HasFactory, HasUuids;

	protected $fillable = [
		'action',
		'comment',
		'date',
	];

	protected $casts = [
		'date' => 'datetime',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function plant():BelongsTo {
		return $this->belongsTo(Plant::class);
	}
}
