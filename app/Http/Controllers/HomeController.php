<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saa\Page\Repo\PageInterface;
use App\Saa\Course\Repo\CourseInterface;
use App\Saa\Module\Repo\ModuleInterface;
use App\Saa\Team\Repo\TeamInterface;
use App\Saa\Alumni\Repo\AlumniInterface;
use App\Saa\Testimonial\Repo\TestimonialInterface;

use App\Http\Requests\SendRequest;

class HomeController extends Controller
{

    protected $page;
    protected $course;
    protected $team;
    protected $alumni;
    protected $testimonial;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageInterface $page, CourseInterface $course, TeamInterface $team, AlumniInterface $alumni, ModuleInterface $module, TestimonialInterface $testimonial)
    {
        $this->page        = $page;
        $this->course      = $course;
        $this->module      = $module;
        $this->team        = $team;
        $this->alumni      = $alumni;
        $this->testimonial = $testimonial;

        $courses = $this->course->getAll()->where('course_status','current');
        $testimonial = $this->testimonial->getAll()->random();

        view()->share('courses',$courses);
        view()->share('testimonial',$testimonial);
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

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        return view('frontend.courses');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('frontend.form');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function course($id)
    {
        $course = $this->course->find($id);

        return view('frontend.course')->with(compact('course'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function module($id,$course)
    {
        $module = $this->module->find($id);

        return view('frontend.module')->with(compact('module','course'));
    }

    /**
     * Send contact message
     *
     * @return Response
     */
    public function sendMessage(SendRequest $request){

        $honeypot = $request->hello;

        if(!empty($honeypot))
        {
            return redirect()->back();
        }

        $data = [
            'title'      => $request->title,
			'first_name' => $request->first_name,
			'last_name'  => $request->last_name,
			'street'     => $request->street,
			'zip'        => $request->zip,
			'place'      => $request->place,
			'state'      => $request->state,
			'country'    => $request->country,
			'remarks'    => $request->remarks,
			'telephone'  => $request->telephone,
			'email'      => $request->email,
			'about'      => $request->about
        ];

        \Mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email'], $data['first_name'].' '.$data['last_name']);

            $message->to('info@saa-switzerland.ch')->subject('Request from http://www.swiss-arbitration-academy.ch');
        });

        return redirect()->back()->with(array('status' => 'success', 'message' => '<strong>Thank you for your request, we will contact you as soon as possible.'));

    }
}
