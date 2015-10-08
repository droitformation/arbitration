<?php namespace App\Saa\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model{

    protected $table = 'saa_testimonials';

    protected $fillable = array('content', 'page_id');

    public $timestamps = false;

}