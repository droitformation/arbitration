<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saa\Page\Repo\PageInterface;
use App\Saa\Course\Repo\CourseInterface;
use App\Saa\Team\Repo\TeamInterface;
use App\Saa\Alumni\Repo\AlumniInterface;

class HomeController extends Controller
{

    protected $page;
    protected $course;
    protected $team;
    protected $alumni;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageInterface $page, CourseInterface $course, TeamInterface $team, AlumniInterface $alumni)
    {
        $this->page   = $page;
        $this->course = $course;
        $this->team   = $team;
        $this->alumni = $alumni;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page    = $this->page->findBySlug('home');
        $courses = $this->course->getAll()->where('course_status','current');

        return view('frontend.index')->with(compact('page','courses'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function page($slug)
    {
        $page = $this->page->findBySlug($slug);

        return view('frontend.page')->with(compact('page'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function team($type)
    {
        $team = $this->team->findByType($type);
        $page = $this->page->findBySlug($type);

        return view('frontend.team')->with(compact('page','team'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function alumni()
    {
        $alumni = $this->alumni->getAll();

        return view('frontend.alumni')->with(compact('alumni'));
    }

}
