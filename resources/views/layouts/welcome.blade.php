@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Welcome to Holiday escapes
@stop


@section ('content')

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h3>login here</h3>


                  {!! Form::open( array ('url' => '/login', 'method' => 'get')) !!}

                  {!! Form::label('username', 'User Name') !!}

                  {!! Form::text('username', 'username', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '46', 'placeholder' => 'Usernam')) !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('password', 'Password') !!}

                  {!! Form::password('password', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '46', 'placeholder' => 'Password')) !!}
               </div>
            </div>

            <br>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  {!! Form::submit('Login', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h3>Register</h3>
                  <a href="/register" data-tog="tooltip" title="Register">Register</a>
               </div>
            </div>




@stop
