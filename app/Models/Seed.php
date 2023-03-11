<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


	public function garden():BelongsTo {
		return $this->belongsTo(Garden::class, 'garden_uuid');
	}


	public function plants():HasMany {
		return $this->hasMany(Plant::class);
	}
}
