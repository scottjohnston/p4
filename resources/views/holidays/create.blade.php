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


                  {!! Form::open( array ('url' => '/holiday/create', 'method' => 'POST')) !!}

                  {!! Form::label('name', 'holidays Name') !!}
                  {!! Form::hidden('user_id', $user->id ) !!}

                  {!! Form::text('name', 'holidays Name', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('description', 'description') !!}

                  {!! Form::text('description','description', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
               </div>
            </div>

{{-- might add this back later
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('url', 'URL') !!}

                  {!! Form::text('url','http://www.tripadvisor.com.au/Tourism-g295415-Luang_Prabang_Luang_Prabang_Province-Vacations.html', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
               </div>
            </div>
--}}
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('due_date', 'Cost') !!}

                  {!! Form::date('due_date', '18/12/15', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
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
                         @foreach($holidays as $holiday)

                           <br>
                           {!! Form::open( array ('url' => "/holiday/update", 'method' => 'POST')) !!}

                           {!! Form::hidden('holiday_id', $holiday['id']) !!}
                           {{ $holiday['name'] }}  {{ $holiday['id'] }}
                           {!! Form::submit('Update holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           <br>
                           {!! Form::open( array ('url' => "/holiday/delete", 'method' => 'POST')) !!}
                           {!! Form::hidden('id', $holiday['id']) !!}
                           {!! Form::submit('Delete holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           <br>
                           {!! Form::open( array ('url' => "/holiday/addescape", 'method' => 'POST')) !!}
                           {!! Form::hidden('id', $holiday['id']) !!}
                           {!! Form::submit('Add Escapes', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                        @endforeach
                    @endif

               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                     {!! isset($user) ? dump($user) : 'request should be here' !!}
                     {!! isset($holidays) ? dump($holidays) : 'request should be here' !!}
                     {!! isset($holidayToDelete) ? dump($holidayToDelete) : '$holidayToDelete' !!}
                  </div>
            </div>

@stop
