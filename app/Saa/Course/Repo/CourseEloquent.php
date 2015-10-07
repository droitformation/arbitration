<?php namespace App\Saa\Course\Repo;

use App\Saa\Course\Repo\CourseInterface;
use App\Saa\Course\Entities\Course as M;

class CourseEloquent implements CourseInterface{

    protected $course;

    public function __construct(M $course)
    {
        $this->course = $course;
    }

    public function getAll(){

        return $this->course->with(['modules'])->get();
    }

    public function find($id){

        return $this->course->with(['modules'])->find($id);
    }

    public function create(array $data){

        $course = $this->course->create(array(
            'title'         => $data['title'],
            'intro'         => $data['intro'],
            'intro'         => $data['intro'],
            'content'       => $data['content'],
            'course_status' => $data['course_status'],
            'course'        => $data['course']
        ));

        if( ! $course )
        {
            return false;
        }

        return $course;

    }

    public function update(array $data){

        $course = $this->course->findOrFail($data['id']);

        if( ! $course )
        {
            return false;
        }

        $course->fill($data);

        $course->save();

        return $course;
    }

    public function delete($id){

        $course = $this->course->find($id);

        return $course->delete($id);

    }

}
