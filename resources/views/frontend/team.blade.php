@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1 class="homepage">{{ $page->title }}</h1>

        {!! $page->content !!}

        <div class="inner tab-content">

            @if($team)
                <ul class="team {{ $page->slug }}">
                    {!! $team !!}
                </ul>
            @endif

            <hr/>

            @if(!empty($honorary))
                <h2 style=" margin: 30px 0 20px 15px;"><strong>Honorary Members</strong></h2>
                <ul class="team council">
                    {!! $honorary !!}
                </ul>
            @endif

        </div>
    </div>

    @include('partials.sidebar')

@stop