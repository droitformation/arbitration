@extends('backend.layouts.master')
@section('content')

    <div class="panel-group" id="accordion"><!-- Start all panel -->

        @if($pages)
            @foreach($pages as $page)

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $page->id }}">{{ $page->title }}</a>
                        </h4>
                    </div>
                    <div id="collapse{{ $page->id }}" class="panel-collapse collapse ">
                        <div class="panel-body">

                            <form action="{{ url('admin/page/'.$page->id) }}" method="POST" id="form">
                                <input type="hidden" name="_method" value="PUT">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ $page->title }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="intro">Intro</label>
                                    <p class="help-block">In case the text has to be cut in two with "read more"</p>
                                    <textarea class="form-control redactor" name="intro" rows="3">{!! $page->intro !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control redactor" name="content" rows="3">{!! $page->content !!}</textarea>
                                </div>

                                <input type="hidden" value="{{ $page->id }}" name="id">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif

    </div><!-- End all panel -->

@stop