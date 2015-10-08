@extends('backend.layouts.master')
@section('content')

    <?php $finder = new \App\Saa\Helper\File(); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-body">

                    <h2>{{ $title }}</h2>

                    <?php $files = $finder->directory_map('files',0); ?>

                    @if(!empty($files))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#" class="toggle"><span class="glyphicon glyphicon-file"></span>&nbsp;<strong>Files</strong></a><span class="badge pull-right">{{ count($files) }}</span>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">

                                    @foreach($files as $file)
                                        @if(!is_array($file))
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-paperclip"></span>&nbsp;{{ $file }}
                                                <a target="_blank" href="{{ url($root.'/'.$file) }}" class="btn btn-info btn-xs pull-right" href="#">download</a>
                                            </div>
                                        @endif
                                    @endforeach

                                    <?php $finder->ListFolderFiles($root); ?>

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

@stop