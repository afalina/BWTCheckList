<?php
namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Participant extends Eloquent
{
    protected $fillable = array('firstname', 'lastname', 'birthday', 'report_subject', 'country', 'phone', 'email', 'company', 'position', 'about_me', 'photo');
    public $timestamps = false;
}