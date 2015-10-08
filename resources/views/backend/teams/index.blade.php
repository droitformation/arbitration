@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-7">

            <p><a data-toggle="collapse" data-target="#addPerson" class="btn btn-success addPerson">New person</a></p>
            <div id="addPerson" class="collapse">

                <form action="{{ url('admin/team') }}" method="POST" class="form" id="formTeam">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="normal" for="Name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"  value="">
                    </div>

                    <div class="form-group">
                        <label class="normal" for="Name">Link</label>
                        <input type="text" name="link" class="form-control" id="link"  value="">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="normal" for="Name">Last name for order</label>
                                <input type="text" style="width:150px;" name="rang" class="form-control" id="rang" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="normal" for="type">Type</label>
                                <select name="type" style="width:150px;"  class="form-control">
                                    <option value="council">Council</option>
                                    <option value="committee">Committee</option>
                                    <option value="guest">Guest</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="normal">Honorary?</label><br/>
                                <label class="radio-inline">
                                    <input checked type="radio" name="honorary" value="0"> no
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="honorary" value="1"> yes
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add person</button>
                </form>
            </div>

        </div>
    </div>
    <hr/>

    @if(!$teams->isEmpty())

        <?php
            $teams = $teams->groupBy('type');
            $types = $teams->keys()->all();
        ?>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTabs">
            @foreach($types as $id => $type)
                <?php $y = str_replace("/", "", $type); ?>
                <?php $active = ($id == 0 ? 'class="active"' : ''); ?>
                <li {!! $active !!}><a href="#{{ $y }}" data-toggle="tab">{{ $type }}</a></li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($types as $id => $type)

                <!-- Tab panes -->
                <?php $y = str_replace("/", "", $type); ?>
                <?php $active = ($id == 0 ? 'active' : ''); ?>
                <div class="tab-pane {{ $active }}" id="{{ $y }}">
                    <div class="panel-group tabbed" id="{{ $y }}{{ $id }}"><!-- Start all panel -->

                        @foreach($teams[$type] as $team)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#{{ $y }}{{ $id }}" href="#collapseteam{{ $team->id }}">
                                       {{ $team->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseteam{{ $team->id }}" class="panel-collapse collapse ">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-11">
                                            <form action="{{ url('admin/team/'.$team->id) }}" method="POST" class="form-inline">
                                                <input type="hidden" name="_method" value="PUT">{!! csrf_field() !!}

                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Name</label>
                                                    <input type="text" name="name" style="width:300px;" class="form-control" id="name"  value="{{ $team->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Link</label>
                                                    <input type="text" name="link" style="width:280px;" class="form-control" id="link"  value="{{ $team->link }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="Name">Order</label>
                                                    <input type="text" name="rang" style="width:140px;" class="form-control" id="rang" value="{{ $team->rang }}">
                                                </div>

                                                @if($team->type == 'committee')
                                                    <div class="form-group">
                                                        <label class="normal"> &nbsp;Honorary? &nbsp;</label>
                                                        <label class="radio-inline">
                                                            <input {{ !$team->honorary ? 'checked' : '' }} type="radio" name="honorary" value="0"> no
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input {{ $team->honorary ? 'checked' : '' }} type="radio" name="honorary" value="1"> yes
                                                        </label>
                                                    </div>
                                                @endif

                                                <input type="hidden" name="id" value="{{ $team->id }}">
                                                <input type="hidden" name="type" value="{{ $team->type }}">
                                                &nbsp;
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <form action="{{ url('admin/team/'.$team->id) }}" method="POST" style="float: right;">
                                                <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                                <button data-action="team" class="btn btn-danger btn-sm deleteAction">x</button>
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