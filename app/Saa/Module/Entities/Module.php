<?php namespace App\Saa\Module\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model{

    protected $table = 'saa_modules';

    protected $fillable = array(
        'module_course', 'module_number','module_title','module_date_start','module_date_stop','module_location','module_lecturers' ,'module_guest','module_text','module_status'
    );

    public $timestamps = false;

}