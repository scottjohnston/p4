@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   escape escapes Create escape
@stop


@section ('content')


         @if(isset($escape))
            {!! Form::open( array ('url' => "/escape/delete/", 'method' => 'POST')) !!}
            {{ $escape[0]['name'] }}  {{ $escape[0]['id'] }}
            {!! Form::hidden('holiday_id', $holiday_id) !!}
            {!! Form::hidden('id', $escape[0]['id']) !!}
            {!! Form::submit('Delete Escape', $attributes = array ('class' => 'btn btn-primary')) !!}
            {!! Form::close() !!}
         @endif
@stop
