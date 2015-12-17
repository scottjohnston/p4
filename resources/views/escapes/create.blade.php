@extends('layouts.master')
{{-- welcome blade --}}


{{-- 'Project 4 Scott Johnston dwa15-' --}}

@section('title')
   escape escapes Create escape
@stop


@section ('content')
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  {!! isset($request_id) ? dump($request_id) : '$request_id should be here' !!}
                  <h3>Add escapes to this holiday</h3>
                  @if(isset($holidayToUpdate))


                     @foreach($holidayToUpdate as $hol)
                           {{ $hol->name }}<br>
                           {{ $hol->id }}<br>
                        @foreach($hol->escapes as $esc)
                           {{ $esc->name}}<br>
                        @endforeach
                     @endforeach

                     
                  @endif

               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h3>Add Escape</h3>
               @if(isset($holidayToUpdate))

                  @foreach($holidayToUpdate as $hols)

                  {!! Form::open( array ('url' => '/escape/create', 'method' => 'POST')) !!}

                  {!! Form::hidden('holiday_id', $hol->id ) !!}

                  {!! Form::label('name', 'escapes Name') !!}

                  {!! Form::text('name', 'escapes Name', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256 ')) !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('description', 'description') !!}

                  {!! Form::text('description','description', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
               </div>
            </div>


            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('url', 'URL') !!}

                  {!! Form::text('url','http://www.tripadvisor.com.au/Tourism-g295415-Luang_Prabang_Luang_Prabang_Province-Vacations.html', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  {!! Form::label('cost', 'Cost') !!}

                  {!! Form::number('cost','1000.00', $attributes = array ('class' => 'form-control scottsTextBox', 'maxlength' => '256' ) ) !!}
               </div>
            </div>

            <br>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  {!! Form::submit('Create new escapes', $attributes = array ('class' => 'btn btn-primary')) !!}

                  {!! Form::close() !!}
               </div>
            </div>



            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >
                  <h4>List of escapes here </h4>


                           @foreach($hols->escapes as $escape)

                              <br>
                              {!! Form::open( array ('url' => "/escape/update/{$escape['id']}", 'method' => 'GET')) !!}
                              {!! Form::hidden('id', $escape['id']) !!}
                              {{ $escape['name'] }}  {{ $escape['id'] }}
                              {!! Form::submit('Update Escape', $attributes = array ('class' => 'btn btn-primary')) !!}
                              {!! Form::close() !!}
                              <br>
                              {!! Form::open( array ('url' => "/escape/delete/form", 'method' => 'POST')) !!}
                              {!! Form::hidden('holiday_id', $hol->id ) !!}
                              {!! Form::hidden('id', $escape['id']) !!}
                              {!! Form::submit('Delete Escape', $attributes = array ('class' => 'btn btn-primary')) !!}
                              {!! Form::close() !!}

                           @endforeach
                        @endforeach
                    @endif

               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8 col-md-offset-2 col-xs-12 col-sm-8 coll-sm-offset-2 col-lg-offset-4 col-lg-4" >

                  </div>
            </div>

@stop
