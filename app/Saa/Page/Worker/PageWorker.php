<?php

namespace App\Saa\Page\Worker;

use Illuminate\Http\Request;

use App\Saa\Page\Worker\PageWorkerInterface;
use App\Saa\Page\Repo\PageInterface;
use App\Saa\Course\Repo\CourseInterface;
use App\Saa\Team\Repo\TeamInterface;

class PageWorker implements PageWorkerInterface{

    protected $page;
    protected $course;
    protected $team;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageInterface $page, CourseInterface $course, TeamInterface $team)
    {
        $this->page   = $page;
        $this->course = $course;
        $this->team   = $team;
    }

    public function renderMenu($node)
    {
        $uri   = \Request::path();
        $teams = ['council','committee','guest'];

        if( $node->isLeaf() )
        {
            if($node->slug == 'courses')
            {
                $html = '<li><a href="' . url('courses') . '" title="Courses">' . str_replace('-', ' ', $node->slug) . '</a>';
                $html .= '<ul class="sub_menu">';

                if(!$node->children->isEmpty())
                {
                    $page  = $node->children->splice(0, 1)->first();
                    $html .= $this->renderMenu($page);

                    $courses = $this->course->getAll()->where('course_status', 'current');
                    if(!$courses->isEmpty())
                    {
                        foreach ($courses as $course)
                        {
                            $html .= '<li><a href="' . url('course/' . $course->id) . '">' . $course->course_title . '</a></li>';
                        }
                    }

                    foreach ($node->children as $child)
                    {
                        $html .= $this->renderMenu($child);
                    }
                }

                $html .= '</li>';
                $html .= '</ul>';

            }
            else if(in_array($node->slug,$teams))
            {
                $html = '<li><a href="' . url('team/'.$node->slug) . '" title="Team">' . str_replace('-', ' ', $node->slug) . '</a>';
            }
            else
            {
                return '<li '.($node->menu_class ? 'class="'.$node->menu_class.'"' : '').'><a '.($uri == 'site/'.$node->slug ? 'class="active"' : '').' href="'.url('site/'.$node->slug).'" title="'.$node->title.'">'.str_replace('-',' ',$node->slug).'</a></li>';
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