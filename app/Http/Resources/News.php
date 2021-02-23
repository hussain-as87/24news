<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        //  return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'details' => $this->details,
            'classification_id' => $this->classification_id,
            'user_id' => $this->user_id,
            'case' => $this->case,

        ];
    }
}
