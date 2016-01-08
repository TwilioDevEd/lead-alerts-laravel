@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <h1>{!! $house['title'] !!}</h1>
        <h3>{!! $house['price'] !!}</h3>
        <img src="images/house.jpg" alt="House" />
        <p>{!! $house['description'] !!}</p>
    </div>
    <div class="col-sm-2 demo">
        <h4>Talk To An Agent</h4>
        <p>
            A trained real estate professional is standing by to answer any
            questions you might have about this property. Fill out the form below
            with your contact information, and an agent will reach out soon.
        </p>
        {!! Form::open(['url' => route('notifications.create')]) !!}
            <input type="hidden" name="houseTitle" value="{!! $house['title'] !!}" />
            <div class="form-group">
                {!! Form::label('name', 'Your Name') !!}
                {!! Form::text('name', '',
                  ['class' => 'form-control', 'placeholder' => 'John Appleseed']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Your Phone Number') !!}
                {!! Form::text('phone', '',
                  ['class' => 'form-control', 'placeholder' => '+16512229988']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'How can we help?') !!}
                {!! Form::text('message', '', ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">Request Info</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection
