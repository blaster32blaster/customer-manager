@extends('layouts.layout')

@section('title', 'Customers')

@section('content')
    <div class="customers-header">
        <div class="customers-title">
            Customers
        </div>
        <div class="new-customer-button">
            <button type="button" class="btn-primary">
                <a href="/customer/create">
                    Create new User
                </a>
            </button>
        </div>
    </div>
    <customer-list></customer-list>
@endsection