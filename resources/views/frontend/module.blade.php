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
            <div class="int">
                <dl>
                    <dt><strong>Head Lecturers : </strong></dt>
                    <dd>{!! $module->module_lecturers !!}</dd>
                    <dt><strong>Guest Lecturers : </strong></dt>
                    <dd>{!! $module->module_lecturers !!}</dd>
                    <hr/>
                </dl>
                <dl>
                    <dt><strong>Dates</strong></dt>
                    <dd>{!! $module->module_date !!}</dd>
                    <dt><strong>Location : </strong></dt>
                    <dd>{!! $module->module_location !!}</dd>
                    <hr/>
                </dl>
            </div>
            <img src="{{ asset('frontend/images/img9.jpg') }}" alt="" />
        </div>
    </div>

@stop