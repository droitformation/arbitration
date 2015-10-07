@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1>{{ $course->title }}</h1>
        <p class="backbtn">
            <a href="{{ url('course') }}"><strong> &laquo; back to courses</strong></a>
        </p>

        <div class="inner long-content">

            {!! $course->content !!}
            {!! $course->subtitle or '' !!}

            <?php
                echo '<pre>';
                print_r($course);
                echo '</pre>';
            ?>

        </div>
    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/img9.jpg') }}" alt="" />
        </div>
    </div>

@stop