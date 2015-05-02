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
                                TopCoder Statistics Here
                            </div>
                        </div>
                    @endif

                    @if(!empty($student->codeforces_id))
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" id="panel-title"><b>CodeForces</b><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
                            </div>
                            <div class="panel-body">
                                CodeForces Statistics Here
                            </div>
                        </div>
                    @endif


                </div>
            </section>
        </div>
    </div>
@stop