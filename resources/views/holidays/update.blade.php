@extends('layouts.master')
{{-- holidays.update.blade --}}

{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Update holiday
@stop


@section ('content')

<div class="row">
   <div class="form-group col-md-12 col-xs-12 col-sm-12 col-lg-12" >
      <h4>Update holiday</h4>


         @if(isset($holiday))

            {!! Form::open( array ('url' => "/holiday/update", 'method' => 'POST')) !!}
            {!! Form::hidden('id', $holiday['id']) !!}

            <br>
               {!! Form::label('name', $holiday['name']) !!}

               {!! Form::text('name', $holiday['name'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
            <br>
               {!! Form::label('description', $holiday['description']) !!}

               {!! Form::text('description', $holiday['description'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
            <br>
               {!! Form::label('due_date', 'Date Due') !!}

               {!! Form::date('due_date', $holiday['due_date'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}

            <br>
               {!! Form::submit('Update holiday', $attributes = array ('class' => 'btn btn-primary')) !!}

               {!! Form::close() !!}
            <br>

         @endif

   </div>
</div>

@stop
