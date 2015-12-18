@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Update Escape
@stop


@section ('content')

      <div class="row">
         <div class="panel panel-default  col-md-12 col-xs-12 col-sm-12 col-lg-12" >
            <h4>Escape to Update</h4>
               <p>
                  Change the data in the form and click update escape.
               </p>
         </div>
      </div>
      <div class="row">
         <div class="form-group panel panel-default col-md-12 col-xs-12 col-sm-12 col-lg-12" >

         @if(isset($escape))

            {!! Form::open( array ('url' => "/escape/update", 'method' => 'POST')) !!}
            {!! Form::hidden('id', $escape[0]['id']) !!}

            <br>
               {!! Form::label('name', 'Name') !!} Must be more than 5 characters long and no more than 256

               {!! Form::text('name', $escape[0]['name'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => 256)) !!}
            <br>
               {!! Form::label('description', 'Description') !!} Must be more than 5 characters long and no more than 256

               {!! Form::text('description', $escape[0]['description'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => 256 ) ) !!}

            <br>
               {!! Form::label('url', 'add a URL') !!} Must be a valid url

               {!! Form::text('url', $escape[0]['url'], $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => 256 ) ) !!}
            <br>
               {!! Form::label('cost', 'Cost') !!}

               {!! Form::number('cost',$escape[0]['cost'], $attributes = array ('class' => 'form-control scottsTextBox','min' => '1', 'max' => '100000') ) !!}
            <br>
               {!! Form::submit('Update Escape', $attributes = array ('class' => 'btn btn-primary')) !!}

               {!! Form::close() !!}
            <br>


         @endif

   </div>
</div>

@stop
