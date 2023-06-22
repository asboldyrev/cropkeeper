<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeedResource extends JsonResource
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
			'description' => $this->description,
			'manufacturer' => $this->manufacturer,
			'count' => $this->count,
			'unit' => $this->unit,
			'garden_uuid' => $this->garden_uuid,
			'bought_at' => $this->bought_at?->toDateString(),
			'expiration_at' => $this->expiration_at?->toDateString(),
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'images' => MediaResource::collection($this->media),
		];
    }
}
