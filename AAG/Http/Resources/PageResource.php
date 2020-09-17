<?php

namespace AAG\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'type'        => $this->type,
            'leads'       => LeadResource::collection($this->whenLoaded('leads')),
            'details'     => $this->whenLoaded('leads', function () {

                $detailData = [
                    'leads_count'        => $this->leads()->count(),
                    'click_through_rate' => $this->click_through_rate,
                    'open_rate'          => $this->open_rate,
                ];

                return $detailData;
            }),
        ];
    }
}
