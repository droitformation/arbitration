<?php namespace App\Saa\Testimonial\Repo;

use App\Saa\Testimonial\Repo\TestimonialInterface;
use App\Saa\Testimonial\Entities\Testimonial as M;

class TestimonialEloquent implements TestimonialInterface{

    protected $testimonial;

    public function __construct(M $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function getAll(){

        return $this->testimonial->all();
    }

    public function find($id){

        return $this->testimonial->find($id);
    }

    public function findBySlug($slug){

        $testimonial = $this->testimonial->where('slug','=',$slug)->get();

        if(!$testimonial->isEmpty())
        {
            return $testimonial->first();
        }

        return false;
    }

    public function create(array $data){

        $testimonial = $this->testimonial->create(array(
            'title'    => $data['title'],
            'intro'    => $data['intro'],
            'content'  => $data['content'],
            'slug'     => $data['slug'],
            'editable' => $data['editable']
        ));

        if( ! $testimonial )
        {
            return false;
        }

        return $testimonial;

    }

    public function update(array $data){

        $testimonial = $this->testimonial->findOrFail($data['id']);

        if( ! $testimonial )
        {
            return false;
        }

        $testimonial->fill($data);

        $testimonial->save();

        return $testimonial;
    }

    public function delete($id){

        $testimonial = $this->testimonial->find($id);

        return $testimonial->delete($id);

    }

}
