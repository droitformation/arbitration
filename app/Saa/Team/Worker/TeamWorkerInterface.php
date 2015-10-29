<?php

namespace App\Saa\Team\Worker;

interface TeamWorkerInterface{

    public function getTeamType($type);
    public function render($type, $filter = null);
    public function formatcouncil($person);
    public function formatsimple($person);
}