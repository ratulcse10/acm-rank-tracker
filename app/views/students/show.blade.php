@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }} <a class="btn btn-success btn-sm" href="{{ URL::route('students.edit', array('id' => $student->id)) }}">Edit Information</a>

                    <span class="pull-right">

                        <a class="btn btn-success btn-sm" href="{{ URL::route('students.index') }}"><span class="fa fa-chevron-left"></span> Students List</a>

					</span>
                </header>
                <div class="panel-body">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="panel-title"><b>Contact Info</b><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
                        </div>
                        <div class="panel-body">
                            <h5><b>Email</b>: {{$student->email}}</h5>
                            <h5><b>Mobile</b>: {{$student->phone}}</h5>
                        </div>
                    </div>

                    @if(!empty($student->uva_id))
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="panel-title"><b>UVA</b><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
                        </div>
                        <div class="panel-body">
                           <p><b>Name:</b> {{$uva[0]->name}}</p>
                            <p><b>UserID:</b> {{$uva[0]->userid}}</p>
                            <p><b>Username:</b> {{$uva[0]->username}}</p>
                            <p><b>Rank:</b> {{$uva[0]->rank}}</p>
                            <p><b>Accepted:</b> {{$uva[0]->ac}}</p>
                            <p><b>Submissions:</b> {{$uva[0]->nos}}</p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($student->topcoder_id))
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" id="panel-title"><b>TopCoder</b><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
                            </div>
                            <div class="panel-body">

                                <p><b>Handle:</b> {{$topcoder->handle}}</p>
                                <p><b>Rating Name:</b> {{$topcoder->ratingSummary[0]->name}}</p>
                                <p><b>Rating:</b> {{$topcoder->ratingSummary[0]->rating}}</p>
                                <p style="{{$topcoder->ratingSummary[0]->colorStyle}}"><b>Color</b><p>

                            </div>
                        </div>
                    @endif

                    @if(!empty($student->codeforces_id))
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" id="panel-title"><b>CodeForces</b><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
                            </div>
                            <div class="panel-body">
{{--                                {{print_r($codeforces)}}--}}
                                <p><b>Handle:</b> {{$codeforces->result[0]->handle}}</p>
                                <p><b>Name:</b> {{$codeforces->result[0]->firstName}} {{$codeforces->result[0]->lastName}}</p>
                                <p><b>Rank:</b> {{$codeforces->result[0]->rank}} [<b>Max:</b> {{$codeforces->result[0]->maxRank}}]</p>
                                <p><b>Rating:</b> {{$codeforces->result[0]->rating}} [<b>Max:</b> {{$codeforces->result[0]->maxRating}}]</p>

                            </div>
                        </div>
                    @endif


                </div>
            </section>
        </div>
    </div>
@stop