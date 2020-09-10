@extends('AAG::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>
                        Welcome to Lead Generation App Dashboard
                    </p>
                    <a href="#" class="btn btn-primary">Manage Pages</a>
                    <a href="{{ route('aag.pages.create') }}" class="btn btn-success">+ Create</a>
                    <a href="{{ route('aag.lp.exercise') }}" class="btn btn-info">Exercise LP - Lead Magnet</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
