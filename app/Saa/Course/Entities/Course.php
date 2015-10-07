<?php namespace App\Saa\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{

    protected $table = 'saa_courses';

    protected $fillable = array('title', 'subtitle','intro','content','course_status','course');

    public $timestamps = false;

}