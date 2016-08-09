<?php
class ModelList extends Model 
{
    public function getData()
    {
        $participants = \App\Participant::orderBy('id', 'desc')->get();
        return $participants;
    }
}