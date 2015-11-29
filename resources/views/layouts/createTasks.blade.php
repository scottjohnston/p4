@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Holiday Escapes Crete Escape
@stop


@section ('content')

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h3>Create a New escape</h3>


                  {!! Form::open( array ('url' => '/task/create', 'method' => 'get')) !!}

                  {!! Form::label('taskName', 'task Name') !!}

                  {!! Form::text('taskName', 'Task Name', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('description', 'description') !!}

                  {!! Form::text('description','description', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '46' ) ) !!}
               </div>
            </div>

            <br>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  {!! Form::submit('Create new task', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}
               </div>
            </div>



            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h4>List of Tasks here </h4>

                     @if(isset($request))
                        {{$request -> taskName}} <br>
                        {{$request -> description}}
                     @endif

               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                     {!! isset($request) ? $request : 'request should be here' !!}
                  </div>
            </div>

@stop
