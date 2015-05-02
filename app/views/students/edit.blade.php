@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('students.index') }}"><span class="fa fa-chevron-left"></span> All Students</a>

					</span>
                </header>
                <div class="panel-body">

                    {{Form::model($student,['route' => ['students.update',$student->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}



                    <div class="form-group">
                        {{ Form::label('name', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', $student->name, array('class' => 'form-control', 'placeholder' => '')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::email('email', $student->email, array('class' => 'form-control', 'placeholder' => 'Email','disabled')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('phone', $student->phone, array('class' => 'form-control', 'placeholder' => '')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('uva_id', 'UVA ID', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('uva_id', $student->uva_id, array('class' => 'form-control', 'placeholder' => '')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('topcoder_id', 'TopCoder ID', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('topcoder_id', $student->topcoder_id, array('class' => 'form-control', 'placeholder' => '')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('codeforces_id', 'CodeForces ID', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('codeforces_id', $student->codeforces_id, array('class' => 'form-control', 'placeholder' => '')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Update Student', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop