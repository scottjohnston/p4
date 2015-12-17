@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Delete an escape
@stop


@section ('content')

         @if(isset($escape))
            <div class="row">
               <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                  Do you really want to delete
               <br>
                  <h4>{{ $escape[0]['name'] }}</h4>
               <div class="panel panel-default">
                  {{ $escape[0]['description'] }}
               </div>
               <div class="panel panel-default">
                  {{ $escape[0]['url'] }}
               </div>
               <div class="panel panel-default">
                  {{ $escape[0]['cost'] }}
               </div>
               {!! Form::open( array ('url' => "/escape/delete/", 'method' => 'POST')) !!}

               {!! Form::hidden('holiday_id', $holiday_id) !!}

               {!! Form::hidden('id', $escape[0]['id']) !!}

               {!! Form::submit('Delete Escape', $attributes = array ('class' => 'btn btn-primary')) !!}

               {!! Form::close() !!}
            </div>
         </div>
         @endif
@stop
