@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-6">

            <p><a data-toggle="collapse" data-target="#addPerson" class="btn btn-success addPerson">New person</a></p>
            <div id="addPerson" class="collapse">

                <form action="{{ url('admin/alumni') }}" method="POST" class="form" id="formAlumni">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="normal" for="Name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"  value="">
                    </div>

                    <div class="form-group">
                        <label class="normal" for="Name">Employer</label>
                        <input type="text" name="employer" class="form-control" id="employer"  value="">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="normal" for="Name">Year</label>
                                <input type="text" placeholder="2014/2015" style="width:150px;" name="year" class="form-control" id="year" value="">
                                <p class="help-block text-danger">Date format: 2014/2015</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="normal" for="Name">Country</label>
                                <input type="text" name="country" class="form-control" id="country"  value="">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add person</button>
                </form>
            </div>

        </div>
    </div>
    <hr/>

    @if(!$alumnis->isEmpty())

        <?php
            $alumnis = $alumnis->groupBy('year');
            $years   = $alumnis->keys()->all();
        ?>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTabs">
            @foreach($years as $id => $year)
                <?php $y = str_replace("/", "", $year); ?>
                <?php $active = ($id == 0 ? 'class="active"' : ''); ?>
                <li {!! $active !!}><a href="#{{ $y }}" data-toggle="tab">{{ $year }}</a></li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($years as $id => $year)

                <!-- Tab panes -->
                <?php $y = str_replace("/", "", $year); ?>
                <?php $active = ($id == 0 ? 'active' : ''); ?>
                <div class="tab-pane {{ $active }}" id="{{ $y }}">
                    <div class="panel-group tabbed" id="{{ $y }}{{ $id }}"><!-- Start all panel -->

                        @foreach($alumnis[$year] as $alumni)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#{{ $y }}{{ $id }}" href="#collapse{{ $id }}">
                                       {{ $alumni->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $id }}" class="panel-collapse collapse ">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-11">
                                            <form action="{{ url('admin/alumni/'.$alumni->id) }}" method="POST" class="form-inline">
                                                <input type="hidden" name="_method" value="PUT">{!! csrf_field() !!}

                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Name</label>
                                                    <input type="text" name="name" style="width:300px;" class="form-control" id="name"  value="{{ $alumni->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Employer</label>
                                                    <input type="text" name="employer" style="width:280px;" class="form-control" id="employer"  value="{{ $alumni->employer }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Country</label>
                                                    <input type="text" name="country" style="width:140px;" class="form-control" id="country" value="{{ $alumni->country }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Year</label>
                                                    <input type="text" name="year" style="width:100px;" class="form-control" id="year" value="{{ $alumni->year }}">
                                                </div>
                                                <input type="hidden" name="id" value="{{ $alumni->id }}">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <form action="{{ url('admin/alumni/'.$alumni->id) }}" method="POST" style="float: right;">
                                                <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                                <button data-action="alumni" class="btn btn-danger btn-sm deleteAction">x</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div><!-- End all panel -->
                </div>

            @endforeach
        </div>

    @endif

@stop