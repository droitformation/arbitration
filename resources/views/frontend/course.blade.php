@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1>{{ $course->title }}</h1>
        <p class="backbtn">
            <a href="{{ url('courses') }}"><strong> &laquo; back to courses</strong></a>
        </p>

        <div class="inner long-content">

            {!! $course->content !!}
            {!! $course->subtitle or '' !!}

            @if(!$course->modules->isEmpty())
                @foreach($course->modules as $module)
                    <div class="mod">
                        <table width="100%" class="module" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td rowspan="3" class="nbr">{{ $module->module_number }}</td>
                                <td class="first"><strong>Topic</strong></td>
                                <td><a href="{{ url('module/'.$module->id.'/'.$course->id) }}">{{ $module->module_title }}</a></td>
                            </tr>
                            <tr>
                                <td class="first"><strong>Head Lecturers</strong></td>
                                <td>{{ $module->module_lecturers }}</td>
                            </tr>
                            <tr>
                                <td class="first"><strong>Dates</strong></td>
                                <td>
                                    {{ $module->module_location }}
                                    {{ $module->module_date }}
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/img9.jpg') }}" alt="" />
        </div>
    </div>

@stop