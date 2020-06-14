<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Standing extends JsonResource
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
            'rank' => $this->ranking,
            'club' => $this->club->club_name,
            'league_id' => $this->league_id,
            'league' => $this->league->league_name,
            'MP' => $this->MP ? $this->MP : 0,
            'W' => $this->W ? $this->W : 0,
            'D' => $this->D ? $this->D : 0,
            'L' => $this->L ? $this->L : 0,
            'Pts' => $this->Pts ? $this->Pts : 0,
            'created_at' => $dateAt,
            'updated_at' => $dateUpd,
        ];
    }
}
