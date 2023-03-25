<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlantResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'uuid' => $this->uuid,
			'name' => $this->name,
			'is_seedling' => $this->is_seedling,
			'is_transplanted' => $this->is_transplanted,
			'garden_uuid' => $this->garden_uuid,
			'seed_uuid' => $this->seed_uuid,
			'plot_uuid' => $this->plot_uuid,
			'planted_at' => $this->planted_at?->toDateString(),
			'harvested_at' => $this->harvested_at?->toDateString(),
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
		];
	}
}
