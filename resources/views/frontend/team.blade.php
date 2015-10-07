@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1 class="homepage">{{ $page->title }}</h1>

        {!! $page->content !!}

        <div class="inner tab-content">

            <?php
                if($page->slug == 'council')
                {
                    $honorary = $team->filter(function ($person) {
                        return $person->honorary > 0;
                    });

                    $team = $team->filter(function ($person) {
                        return $person->honorary == 0;
                    });
                }
            ?>

            @if(!$team->isEmpty())
                <ul class="team {{ $page->slug }}">
                    @foreach($team as $person)
                        <li>
                            @if($person->person_photo)
                                <img src="{{ asset('images/team/'.$person->person_photo) }}" />
                            @endif
                            {{ $person->name }}
                            <a href="{{ url($person->link) }}" target="_blank">Web link</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <hr/>

            @if(isset($honorary) && !$honorary->isEmpty())
                <h2 style=" margin: 30px 0 20px 15px;"><strong>Honorary Members</strong></h2>
                <ul class="team council">
                    @foreach($honorary as $person)
                        <li>
                            <img src="{{ asset('images/team/'.$person->person_photo) }}" />
                            {{ $person->name }}
                            <a href="{{ url($person->link) }}" target="_blank">Web link</a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/'.$page->image.'') }}" alt="" />
        </div>
    </div>

@stop