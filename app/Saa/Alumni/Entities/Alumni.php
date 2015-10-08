<?php namespace App\Saa\Alumni\Entities;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model{

    protected $table = 'saa_alumnis';

    protected $fillable = array('name','employer','year','country');

    public $timestamps = false;

}