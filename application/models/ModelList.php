<?php
class ModelList extends Model 
{
    public function getData()
    {
        $participants = \App\Participant::all();
        return $participants;
    }
}