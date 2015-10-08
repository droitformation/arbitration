@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1 class="homepage">{{ $page->title }}</h1>

        @if(Request::has('readmore'))
            <p class="backbtn"><a href="{{ url(Request::path()) }}"><strong> &laquo; back </strong></a></p>
            <div class="inner home-content">
                {!! $page->content !!}
            </div>
        @else
            <div class="inner page-content">
                @if($page->intro != '')
                    {!! $page->intro !!}
                    <p><a href="{{ url(Request::path().'/?readmore=ok') }}" class="btn">Read more</a></p>
                @else
                    {!! $page->content !!}
                @endif
            </div>
        @endif

    </div>

    @include('partials.sidebar',['page' => $page])

@stop