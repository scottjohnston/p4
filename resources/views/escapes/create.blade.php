@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
    Creaete escapes and add them to Holidays
@stop


@section ('content')
            <div class="row">
               <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                  <h3>Add escapes to this holiday</h3>
                  <p>
                     Enter the data for your escape in the form bellow and click create escape to add
                     an escape to your holiday. Add as manny escapes as you need too.
                  </p>
                  @if(isset($holidayToUpdate))

                     @foreach($holidayToUpdate as $hol)
                           <h3>{{ $hol->name }}</h3>
                     @endforeach
                  @endif

               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-12 col-xs-12 col-sm-12 col-lg-12" >
                  <h3>Add Escape</h3>
               @if(isset($holidayToUpdate))

                  @foreach($holidayToUpdate as $hols)

                     {!! Form::open( array ('url' => '/escape/create', 'method' => 'POST')) !!}

                     {!! Form::hidden('holiday_id', $hol->id ) !!}

                     {!! Form::label('name', '') !!} Must be more than 5 characters long and no more than 256

                     {!! Form::text('name', '', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}

                     {!! Form::label('description', 'description') !!} Must be more than 5 characters long and no more than 256

                     {!! Form::text('description','', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}

                     {!! Form::label('url', 'add a URL') !!} must be a valid url

                     {!! Form::text('url','', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}

                     {!! Form::label('cost', 'Cost') !!}

                     {!! Form::number('cost','', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}


                     {!! Form::submit('Create new escapes', $attributes = array ('class' => 'btn btn-primary')) !!}

                     {!! Form::close() !!}
               </div>
            </div>

             <h4>Escapes that are part of this holiday </h4>


               @foreach($hols->escapes as $escape)
                  <div class="row">
                     <div class="panel panel-default col-md-12 col-xs-12 col-sm-12 col-lg-12" >

                     <br>
                     {!! Form::open( array ('url' => "/escape/update/{$escape['id']}", 'method' => 'GET')) !!}
                     {!! Form::hidden('id', $escape['id']) !!}
                     <h4>{{ $escape['name'] }}</h4>
                     {{ $escape['url'] }}
                     <br>
                     {{ $escape['cost'] }}
                     <br>
                     {{ $escape['description'] }}
                     <br>
                     {!! Form::submit('Update Escape', $attributes = array ('class' => 'btn btn-primary')) !!}
                     {!! Form::close() !!}
                     <br>
                     {!! Form::open( array ('url' => "/escape/delete/form", 'method' => 'POST')) !!}
                     {!! Form::hidden('holiday_id', $hol->id ) !!}
                     {!! Form::hidden('id', $escape['id']) !!}
                     {!! Form::submit('Delete Escape', $attributes = array ('class' => 'btn btn-primary')) !!}
                     {!! Form::close() !!}
                     </div>
                  </div>
               @endforeach
            @endforeach
        @endif




@stop
