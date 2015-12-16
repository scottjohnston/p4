@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   escape escapes Create escape
@stop


@section ('content')
         {!! isset($holidayWithEscapes) ? dump($holidayWithEscapes) : 'omg should be here' !!}



@stop
