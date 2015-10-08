@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1>{{ $module->module_title }}</h1>

        <p class="backbtn">
            <a href="{{ url('course/'.$course) }}"><strong> &laquo; back to courses</strong></a>
        </p>

        <div class="inner long-content">
            <div class="inner page-content">
                {!! $module->module_text !!}
            </div>
        </div>
    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/img9.jpg') }}" alt="" />
        </div>
    </div>

@stop