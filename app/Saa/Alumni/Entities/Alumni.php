<?php namespace App\Saa\Alumni\Entities;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model{

    protected $table = 'saa_alumnis';

    protected $fillable = array('content', 'page_id');

    public $timestamps = false;

}