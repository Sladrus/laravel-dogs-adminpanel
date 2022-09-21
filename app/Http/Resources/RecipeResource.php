<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'grams' => $this->grams,
            'kcal' => $this->kcal,
            'fats' => $this->fats,
            'carbs' => $this->carbs,
            'time' => $this->time,
            'difficult' => $this->difficult,
            'categories' => $this->categories,
            'ingredients' => IngredientResource::collection($this->ingredients),
        ];
    }
}
