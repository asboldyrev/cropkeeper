<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasUuids;

	protected $fillable = [
		'login',
		'email',
		'password',
		'first_name',
		'last_name',
		'email_verified_at',
	];


	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function gardens():BelongsToMany {
		return $this->belongsToMany(Garden::class);
	}


	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}


	public function reminders():HasMany {
		return $this->hasMany(Reminder::class);
	}
}
