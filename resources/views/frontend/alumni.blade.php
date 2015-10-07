@extends('layouts.master')
@section('content')

<div class="bloc six columns">

    <h1 class="homepage">List of Alumni </h1>

    @if(!$alumni->isEmpty())

        <?php
            $alumnis = $alumni->groupBy('year');
            $years   = $alumnis->keys()->all();
        ?>

        <div id="thetabs"><!-- tabs -->

            <!-- nav tabs -->
            <ul id="tabbed">
                @foreach($years as $year)
                   <li><a href="#tabs-{{ $year }}">{{ $year }}</a></li>
                @endforeach
            </ul>
            <!-- end nav tabs -->
            <!-- div content -->
            @foreach($alumnis as $year => $alumni)
                <div id="tabs-{{ $year }}">
                    <table width="480">
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Employer</th>
                        </tr>
                        @foreach($alumni as $person)
                        <tr>
                            <td width="35%"><p>{{ $person->name }}</p></td>
                            <td width="30%"><p>{{ $person->country }}</p></td>
                            <td width="35%"><p>{{ $person->employer }}</p></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            @endforeach
            <!-- div content -->

        </div><!-- end tabs -->

    @endif

</div>

<div class="six columns">
    <div class="img-holder">
        <img src="{{ asset('frontend/images/img3.jpg') }}" alt="" />
    </div>
</div>

@stop