@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   Delete holiday
@stop


@section ('content')

               @if(isset($holiday))

                  @foreach($holiday as $hol)
                     <div class="row">
                       <div class="panel panel-default col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                         <p>
                           Do you really want to delete this holiday? Deletion is final.
                        </p>
                        <h4>{{ $hol->name }}</h4>
                        <div class="panel panel-default">
                           {{ $hol->description }}
                        </div>
                           <h5>Date due </h5>
                           <div class="panel panel-default">
                              {{ $hol->due_date }}
                           </div>
                           {!! Form::open( array ('url' => "/holiday/delete", 'method' => 'POST')) !!}
                           {!! Form::hidden('id', $hol->id) !!}
                           {!! Form::submit('Delete holiday', $attributes = array ('class' => 'btn btn-primary')) !!}
                           {!! Form::close() !!}
                           <h4>The following escapes will be deleted with it</h4>
                        </div>
                     </div>

                        @foreach($hol->escapes as $esc)
                           <div class="row">
                              <div class="panel panel-default col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                                 {{ $esc->name}}<br>
                                 {{ $esc->description}}<br>
                              </div>
                           </div>
                        @endforeach
                     @endforeach
                  @endif


@stop
