@extends('layouts.layout')

@section('title', 'Create a new Customer')

@section('content')
    {{--{!! Form::open(['url' => 'customer', 'method' => 'post']) !!}--}}
        {{--Form::model($customer, ['route' => ['customer.create', $customer->id]])--}}
        {{--Form::label('name', 'Customer Name');--}}
        {{--Form::text('name');--}}
    {{--{!! Form::close() !!}--}}
    {!! Form::model($customer, ['action' => 'CustomerController@store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>
    <button class="btn btn-success" type="submit">Create User</button>
    {!! Form::close() !!}
@endsection