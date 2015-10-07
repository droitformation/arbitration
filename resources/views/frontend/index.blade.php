@extends('layouts.master')
@section('content')

    <div class="bloc six columns">

        <h1 class="homepage">{{ $page->title }}</h1>

        @if(Request::has('readmore'))
            <p class="backbtn"><a href="{{ url('/') }}"><strong> &laquo; back </strong></a></p>
            <div class="inner home-content">
                {!! $page->content !!}
            </div>
        @else
            <div class="inner home-content">
                @if($page->intro != '')
                    {!! $page->intro !!}
                    <p><a href="{{ url('?readmore=ok') }}" class="btn">Read more</a></p>
                @else
                    {!! $page->content !!}
                @endif
            </div>
        @endif

        <p class="socialBtnLinkedin"><a class="linkedIn" href="http://www.linkedin.com/groups?home=&gid=4911871&trk=anet_ug_hm" target="_blank"></a>Connect with us on LinkedIn</p>
        <p class="socialBtnFacebook"><a class="facebook" href="https://www.facebook.com/pages/Swiss-Arbitration-Academy/144193019083742?ref=stream" target="_blank"></a>Join us on Facebook</p>

    </div>

    <div class="six columns">
        <div class="img-holder">

            @if(!$courses->isEmpty())
                @foreach($courses as $course)
                    <div class="int home">
                        <h2>{!! $course->title !!}</h2>
                        <p><a href="{{ url('course/'.$course->id) }}">learn about this course</a></p>
                    </div>
                @endforeach
            @endif

            @if(!$page->blocs->isEmpty())
                <?php $sort = $page->blocs->sortBy('sorting'); ?>
                @foreach($sort as $bloc)
                    <div class="int home">
                        {!! $bloc->content !!}
                    </div>
                @endforeach
            @endif

            <img src="{{ asset('frontend/images/'.$page->image.'') }}" alt="" />
        </div>
    </div>

@stop