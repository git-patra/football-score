<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Match extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $score = $this->score_home . ' : ' . $this->score_away;

        $dateAt = $this->created_at;
        $dateAt = $dateAt->format('D, d/m h:i');

        $dateUpd = $this->updated_at;
        $dateUpd = $dateUpd->format('D, d/m h:i');

        return [
            'id' => $this->id,
            'club_home' => $this->home->club_name,
            'club_away' => $this->away->club_name,
            'score' => $score,
            'league' => $this->league->league_name,
            'league_id' => $this->league_id,
            'created_at' => $dateAt,
            'updated_at' => $dateUpd,
        ];
    }
}
