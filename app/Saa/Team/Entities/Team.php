<?php namespace App\Saa\Team\Entities;

use Illuminate\Database\Eloquent\Model;

class Team extends Model{

    protected $table = 'saa_team';

    protected $fillable = array('name', 'link','photo','type','rang');

    public $timestamps = false;

    public function getPersonPhotoAttribute()
    {
        if($this->type == 'council')
        {
            return ($this->photo != '' ? $this->photo : 'avatar.jpg');
        }

        return false;
    }
}