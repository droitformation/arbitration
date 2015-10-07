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
    }

    public function modules()
    {
        return $this->hasMany('App\Saa\Module\Entities\Module');
    }

}