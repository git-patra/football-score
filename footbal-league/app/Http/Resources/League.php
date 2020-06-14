<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class League extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

        $dateAt = $this->created_at;
        $dateAt = $dateAt->format('D, d/m h:i');

        $dateUpd = $this->updated_at;
        $dateUpd = $dateUpd->format('D, d/m h:i');

        return [
            'id' => $this->id,
            'league' => $this->league_name,
            'created_at' => $dateAt,
            'updated_at' => $dateUpd,
        ];
    }
}
