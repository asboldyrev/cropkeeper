<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    use HasFactory, HasUuids;

	protected $fillable = [
		'title',
		'description',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function user():BelongsTo {
		return $this->belongsTo(User::class);
	}
}
