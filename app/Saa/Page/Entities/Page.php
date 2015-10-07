<?php namespace App\Saa\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model{

    protected $table = 'saa_pages';

    protected $fillable = array('title', 'intro','content','slug','editable');

    public $timestamps = false;

    public function blocs()
    {
        return $this->hasMany('App\Saa\Bloc\Entities\Bloc');
    }

}