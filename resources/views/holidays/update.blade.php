@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Update holiday
@stop


@section ('content')

<div class="row">
   <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
      <h4>holiday to Update</h4>


         @if(isset($holiday))

            {!! Form::open( array ('url' => "/holiday/update/send", 'method' => 'POST')) !!}
            {!! Form::text('id', $holiday['id']) !!}

            <br>
               {!! Form::label('name', $holiday['name']) !!}

               {!! Form::text('name', $holiday['name'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
            <br>
               {!! Form::label('description', $holiday['description']) !!}

               {!! Form::text('description', $holiday['description'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}


            <br>
               {!! Form::submit('Update holiday', $attributes = array ('class' => 'btn btn-primary')) !!}

               {!! Form::close() !!}
            <br>


         @endif

{!! isset($holiday1) ? dump($holiday1) : 'omg where did it go should be here' !!}
   </div>
</div>

@stop
