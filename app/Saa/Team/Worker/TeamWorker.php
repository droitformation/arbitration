<?php

namespace App\Saa\Team\Worker;

use App\Saa\Team\Worker\TeamWorkerInterface;
use App\Saa\Team\Repo\TeamInterface;
use Mustache_Engine;
use Illuminate\Filesystem\Filesystem;

class TeamWorker implements TeamWorkerInterface{

    protected $team;
    protected $mustache;
    protected $file;

    public function __construct( TeamInterface $team, Mustache_Engine $mustache, Filesystem $file )
    {
        $this->team     = $team;
        $this->mustache = $mustache;
        $this->file     = $file;
    }

    public function getTeamType($type)
    {
        return $this->team->getAll()->where('type',$type);
    }

    public function render($type, $filter = null)
    {
        $persons = $this->getTeamType($type);

        if(!$persons->isEmpty())
        {
            $list = '';

            if($type == 'council')
            {
                if($filter)
                {
                    $persons = $persons->filter(function ($person){
                        return $person->honorary > 0;
                    });
                }

                foreach($persons as $person)
                {
                    $list .= $this->formatcouncil($person);
                }

                return $list;
            }
            else
            {
                $persons = $persons->sortBy('rang')->groupBy(function ($item, $key) {
                    return substr($item->rang, 0,1);
                });

                foreach($persons as $letter => $person)
                {
                    $list .= '<p class="letter"><strong>'.strtoupper($letter).'</strong></p>';

                    foreach($person as $team)
                    {
                        $list .= $this->formatsimple($team);
                    }
                }

                return $list;
            }
        }

        return '<li>No team</li>';
    }

    public function formatcouncil($person)
    {
        $html  = '<li>';
        $html .= '<img src="'.asset('images/team/'.$person->person_photo).'" />';
        $html .= $person->name;
        $html .= '<a href="'.$person->link.'" target="_blank">Web link</a>';
        $html .= '</li>';

        return $html;
    }

    public function formatsimple($person)
    {
        $pieces = explode(',', $person->name);
        $name   = $pieces[0];

        unset($pieces[0]);

        $html  = '<li>';
        $html .= '<div class="row">';
        $html .= '<div class="ten columns"><p><strong>'.$name.'</strong></p><p>'.implode(';',$pieces).'</div>';
        $html .= '<div class="two columns"><a href="'.$person->link.'" target="_blank">Web link</a></div>';
        $html .= '</div>';
        $html .= '</li>';

        return $html;
    }

}