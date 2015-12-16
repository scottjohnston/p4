@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Deleted hollidays
@stop


@section ('content')
         {!! isset($holiday) ? dump($holiday) : 'omg should be here' !!}



@stop
