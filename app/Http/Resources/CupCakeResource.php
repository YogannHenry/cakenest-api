<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CupCakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'imageSource' => $this->image,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'isAvailable' => $this->is_available,
            'isAdvertised' => $this->is_advertised,
        ];
    }
}
