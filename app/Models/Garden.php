<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Garden extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'name',
		'description',
		'polygon',
		'area',
	];

	protected $casts = [
		'area' => 'float',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function users():BelongsToMany {
		return $this->belongsToMany(User::class)->withPivot('role');
	}
}
