<?php namespace App\Saa\Page\Entities;

use Baum\Node;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Node{

    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = ['title', 'intro','content','slug','image','editable','rang','image','parent_id', 'lft','rgt','depth'];

    protected $dates = ['deleted_at'];

    public function blocs()
    {
        return $this->hasMany('App\Saa\Bloc\Entities\Bloc');
    }

}