@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Holiday Escapes New User
@stop


@section ('content')

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-2 col-lg-8" >
                  <h3>Create a New user account</h3>
                      @if(count($errors) > 0)
                        <ul class='errors'>
                           @foreach ($errors->all() as $error)
                               <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                           @endforeach
                        </ul>
                     @endif

                  {!! Form::open( array ('url' => '/register', 'method' => 'post')) !!}

                  {!! Form::label('name', 'User Name') !!}

                  {!! Form::text('name', old('name'), $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '46', 'placeholder' => 'username')) !!}

                  {!! Form::label('email', 'email') !!}

                  {!! Form::text('email', old('email'), $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '60', 'placeholder' => 'email')) !!}

                  {!! Form::label('password', 'Password') !!}

                  {!! Form::password('password', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '60', 'placeholder' => 'Password') ) !!}

                  {!! Form::label('password_confirmation', 'Password confirmation') !!}

                  {!! Form::password('password_confirmation', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '60', 'placeholder' => 'Password') ) !!}



                  {!! Form::submit('Register New User', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}
               </div>
            </div>






@stop
