@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Update Escape
@stop


@section ('content')

<div class="row">
   <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
      <h4>Escape to Update</h4>

         @if(isset($escape))

            {!! Form::open( array ('url' => "/escape/update", 'method' => 'POST')) !!}
            {!! Form::hidden('id', $escape[0]['id']) !!}

            <br>
               {!! Form::label('name', $escape[0]['name']) !!}

               {!! Form::text('name', $escape[0]['name'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
            <br>
               {!! Form::label('description', $escape[0]['description']) !!}

               {!! Form::text('description', $escape[0]['description'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}

            <br>
               {!! Form::label('url', $escape[0]['url']) !!}

               {!! Form::text('url', $escape[0]['url'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
            <br>
               {!! Form::label('cost', 'Cost') !!}

               {!! Form::number('cost',$escape[0]['cost'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
            <br>
               {!! Form::submit('Update Escape', $attributes = array ('class' => 'btn btn-primary')) !!}

               {!! Form::close() !!}
            <br>


         @endif
         {!! isset($request) ? dump($request) : 'omg should be here' !!}
   </div>
</div>

@stop
