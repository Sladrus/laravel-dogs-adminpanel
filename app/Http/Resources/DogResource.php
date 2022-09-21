<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->title,
            'desc' => $this->desc,
            'icon' => $this->icon,
            'age' => $this->age,
            'gender' => $this->gender,
            'dogTypes' => $this->dogTypes,
            'parents' => $this->parents,
            //'ingredients' => IngredientResource::collection($this->ingredients),
        ];
    }
}
