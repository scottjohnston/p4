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
                      @if(count($errors) > 0)
                        <ul class='errors'>
                           @foreach ($errors->all() as $error)
                               <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                           @endforeach
                        </ul>
                     @endif

                  {!! Form::open( array ('url' => '/login', 'method' => 'post')) !!}

                  {!! Form::label('name', 'User Name') !!}

                  {!! Form::text('name', old('name'), $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '46', 'placeholder' => 'username')) !!}

                  {!! Form::label('email', 'email') !!}

                  {!! Form::text('email', old('email'), $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '60', 'placeholder' => 'email')) !!}

                  {!! Form::label('password', 'Password') !!}

                  {!! Form::password('password', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '60', 'placeholder' => 'Password') ) !!}

                  {!! Form::label('remember', 'Remember me') !!}<br>

                  {!! Form::checkbox('remember' ) !!}<br>

                  {!! Form::submit('Login', $attributes = array ('class' => 'btn btn-primary')) !!}<br>

                  <p>
                     New users please sign up here
                  </p>
                  <a href="/register" data-tog="tooltip" title="Register"><h3>Register</h3></a>
               </div>
            </div>




@stop
