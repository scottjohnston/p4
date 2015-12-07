@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Holiday holidays Create holiday
@stop


@section ('content')

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h3>Create a New holiday</h3>


                  {!! Form::open( array ('url' => '/holidays/create', 'method' => 'get')) !!}

                  {!! Form::label('holidaysName', 'holidays Name') !!}

                  {!! Form::text('holidaysName', 'holidays Name', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
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
                  {!! Form::submit('Create new holidays', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}
               </div>
            </div>



            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h4>List of holidays here </h4>

                     @if(isset($holidays))
                        {{ dump($holidays->toArray()) }} <br>

                     @endif

               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                     {!! isset($request) ? $request : 'request should be here' !!}
                  </div>
            </div>

@stop
