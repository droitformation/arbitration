<?php namespace App\Saa\Module\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model{

    protected $table = 'saa_modules';

    protected $fillable = array(
        'module_course', 'module_number','module_title','module_date_start','module_date_stop','module_location','module_lecturers' ,'module_guest','module_text','module_status'
    );

    protected $dates = ['module_date_start','module_date_stop'];

    public $timestamps = false;

    public function getModuleDateAttribute()
    {
        setlocale(LC_ALL, 'fr_FR.UTF-8');

        if(isset($this->module_date_start) && ($this->module_date_start != $this->module_date_stop))
        {
            $month  = ($this->module_date_start->month == $this->module_date_stop->month ? '%d' : '%d %B');
            $year   = ($this->module_date_start->year ==  $this->module_date_stop->year ? '' : '%Y');
            $format = $month.' '.$year;

            return $this->module_date_start->formatLocalized($format).' to '.$this->module_date_stop->formatLocalized('%d %B %Y');
        }
        else
        {
            return $this->module_date_start->formatLocalized('%d %B %Y');
        }
    }

    public function course()
    {
        return $this->belongsToMany('App\Saa\Course\Entities\Course','course_modules','module_id','course_id');
    }

}