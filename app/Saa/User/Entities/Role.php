<?php namespace App\Saa\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Set timestamps off
     */
    public $timestamps = false;

}