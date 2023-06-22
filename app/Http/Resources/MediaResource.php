<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		// return parent::toArray($request);
		$urls = [
			'original' => $this->getUrl(),
		];

		foreach($this->generated_conversions as $conversion_name => $has_conversion) {
			if($has_conversion) {
				$urls[$conversion_name] = $this->getUrl($conversion_name);
			}
		}

		return [
			'media' => [
				'id' => $this->id,
				'collection_name' => $this->collection_name,
				'name' => $this->name,
				'file_name' => $this->file_name,
				'mime_type' => $this->mime_type,
				'size' => $this->size,
				'custom_properties' => $this->custom_properties,
				'generated_conversions' => $this->generated_conversions,
				'_lft' => $this->_lft,
				'_rgt' => $this->_rgt,
				'parent_id' => $this->parent_id,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
				'uuid' => $this->uuid,
			],
			'urls' => $urls
		];
	}
}
