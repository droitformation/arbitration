<?php namespace App\Saa\Bloc\Entities;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model{

    protected $table = 'saa_blocs';

    protected $fillable = array('content', 'page_id');

    public $timestamps = false;

}