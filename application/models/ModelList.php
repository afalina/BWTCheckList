<?php
namespace App;

class ModelList extends \App\Model
{
    public function getData()
    {
        $participants = \App\Participant::orderBy('id', 'desc')->get();
        return $participants;
    }
}