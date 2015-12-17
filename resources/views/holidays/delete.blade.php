@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Deleted hollidays
@stop


@section ('content')
         {!! isset($holiday) ? dump($holiday) : 'omg should be here' !!}<br>right here<br>

                  @if(isset($holiday))
                  holiday is set
                     @foreach($holiday as $hol)
                           {{ $hol->name }}<br>
                           {{ $hol->id }}<br>
                        @foreach($hol->escapes as $esc)
                           {{ $esc->name}}<br>
                        @endforeach
                     @endforeach
                  @endif

   @if(isset($holidaydfjsd))
<br>
{!! Form::open( array ('url' => "/holiday/delete", 'method' => 'POST')) !!}
{{ $holiday['name'] }}  {{ $holiday['id'] }}
{!! Form::hidden('id', $holiday['id']) !!}
{!! Form::submit('Delete holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
<br>
   @endif
@stop
