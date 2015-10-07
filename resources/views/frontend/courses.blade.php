@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <div class="inner page-content">

            @if(!$courses->isEmpty())
                @foreach($courses as $course)
                    <h1>{{ $course->title }}</h1>
                    {!! $course->intro !!}
                    <p><a href="{{ url('course/'.$course->id) }}" class="btn">learn more</a></p>
                @endforeach
            @endif

            <p>Download the e-booklet with information about the SAA courses<br/>
                <a href="{{ asset('documents/eVersionBookletCASArbitration.pdf') }}" target="_blank" class="btn">=> e-booklet</a>
            </p>

        </div>
    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/img9.jpg') }}" alt="" />
        </div>
    </div>

@stop