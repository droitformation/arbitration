<?php namespace App\Saa\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{

    protected $table = 'saa_courses';

    protected $fillable = array('title', 'subtitle','intro','content','course_status','course');

    public $timestamps = false;

    public function getCourseTitleAttribute()
    {
        if($this->course == 'cas')
        {
            return 'CAS in Arbitration';
        }

        if($this->course == 'arbp')
        {
            return 'SAA Practitioner’s Course';
        }

        if($this->course == 'module')
        {
            return 'Individual Modules';
        }
    }

    public function modules()
    {
        return $this->belongsToMany('App\Saa\Module\Entities\Module','course_modules','course_id','module_id');
    }

}