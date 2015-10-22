<?php

namespace App\Saa\Page\Worker;

use Illuminate\Http\Request;

use App\Saa\Page\Worker\PageWorkerInterface;
use App\Saa\Page\Repo\PageInterface;
use App\Saa\Course\Repo\CourseInterface;

class PageWorker implements PageWorkerInterface{

    protected $page;
    protected $course;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageInterface $page, CourseInterface $course)
    {
        $this->page   = $page;
        $this->course = $course;
    }

    public function renderMenu($node)
    {
        $uri = \Request::path();

        if( $node->isLeaf() )
        {
            if($node->slug == 'courses')
            {
                $courses = $this->course->getAll()->where('course_status','current');

                $html    = '<li><a href="' . url('courses'). '" title="Courses">'.str_replace('-',' ',$node->slug).'</a>';
                $html   .= '<ul class="sub_menu">';

                if(!$courses->isEmpty())
                {
                    foreach ($courses as $course)
                    {
                        $html .= '<li><a href="'.url('course/' . $course->id).'">'.$course->course_title.'</a></li>';
                    }
                }

                if(!$node->children->isEmpty())
                {
                    foreach ($node->children as $child)
                    {
                        $html .= $this->renderMenu($child);
                    }
                }

                $html .= '</li>';
                $html .= '</ul>';

            }
            else
            {
                return '<li><a '.($uri == 'site/'.$node->slug ? 'class="active"' : '').' href="'.url('site/'.$node->slug).'" title="'.$node->title.'">'.str_replace('-',' ',$node->slug).'</a></li>';
            }
        }
        else
        {
            $html = '<li><a '.($uri == 'site/'.$node->slug ? 'class="active"' : '').' href="'.url('site/' . $node->slug).'" title="'.$node->title.'">'.str_replace('-',' ',$node->slug).'</a>';

            if(!$node->children->isEmpty())
            {
                $html .= '<ul class="sub_menu">';

                foreach ($node->children as $child)
                {
                    $html .= $this->renderMenu($child);
                }

                $html .= '</ul>';
            }

            $html .= '</li>';
        }

        return (isset($html) ? $html : '');
    }

}