<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Harvest extends Model
{
    use HasFactory, HasUuids;

	protected $fillable = [
		'harvested_at',
		'count',
	];

	protected $casts = [
		'harvested_at' => 'datetime',
		'count' => 'integer',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function plant():BelongsTo {
		return $this->belongsTo(Plant::class);
	}
}
