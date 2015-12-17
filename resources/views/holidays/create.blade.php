@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Create a holiday
@stop


@section ('content')

            <div class="row">
               <div class="form-group col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                  <h3>Create a New holiday</h3>

                  {!! Form::open( array ('url' => '/holiday/create', 'method' => 'POST')) !!}

                  {!! Form::label('name', 'Holidays Name') !!}
                  {!! Form::hidden('user_id', $user->id ) !!}

                  {!! Form::text('name', '', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
                  <br>


                  {!! Form::label('description', 'description') !!}

                  {!! Form::text('description','', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}

                  {!! Form::label('due_date', 'Date Due') !!}

                  {!! Form::date('due_date', '', $attributes = array ('class' => 'form-control scottsTextBox' ) ) !!}
                  <br>

                  {!! Form::submit('Create new holidays', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}

                  <h3>All of your holidays are Below </h3>
               </div>
            </div>
                     @if(isset($holidays))

                         @foreach($holidays as $holiday)
                         <div class="row">
                            <div class="panel panel-default col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                           <p>
                              <h4 >{{ $holiday['name'] }}</h4>
                              {{ $holiday['description'] }}
                              <br>
                                 Date due
                              <br>
                              {{ $holiday['due_date'] }}
                           </p>
                           {!! Form::open( array ('url' => "/holiday/update/{$holiday['id']}", 'method' => 'get')) !!}

                           {!! Form::hidden('holiday_id', $holiday['id']) !!}

                           {!! Form::submit('Update holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           <br>
                           {!! Form::open( array ('url' => "/holiday/delete/{$holiday['id']}", 'method' => 'GET')) !!}
                           {!! Form::hidden('id', $holiday['id']) !!}
                           {!! Form::submit('Delete holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           <br>
                           {!! Form::open( array ('url' => "/holiday/addescape/{$holiday['id']}", 'method' => 'get')) !!}
                           {!! Form::hidden('id', $holiday['id']) !!}
                           {!! Form::submit('Add Escapes', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           </div>
                        </div>
                        @endforeach
                    @endif




@stop
