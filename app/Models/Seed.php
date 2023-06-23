<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Seed extends Model implements HasMedia
{
	use HasFactory, HasUuids, InteractsWithMedia;

	protected $fillable = [
		'name',
		'manufacturer',
		'description',
		'bought_at',
		'expiration_at',
		'count',
		'unit',
	];

	protected $casts = [
		'bought_at' => 'date',
		'expiration_at' => 'date',
		'count' => 'float',
	];

	protected $primaryKey = 'uuid';

	public $incrementing = false;


	public function garden(): BelongsTo
	{
		return $this->belongsTo(Garden::class, 'garden_uuid');
	}


	public function plants(): HasMany
	{
		return $this->hasMany(Plant::class);
	}


	public function registerMediaCollections(): void
	{
		$this
			->addMediaCollection('default')
			->singleFile();
	}


	public function registerMediaConversions(Media $media = null): void
	{
		$this
			->addMediaConversion('preview')
			->fit(Manipulations::FIT_CROP, 270, 480)
			->nonQueued();

		$this
			->addMediaConversion('thumb')
			->fit(Manipulations::FIT_MAX, 200, 200)
			->nonQueued();
	}
}
