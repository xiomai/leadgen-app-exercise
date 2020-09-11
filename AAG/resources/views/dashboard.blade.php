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
                    <a href="{{ route('aag.pages.index') }}" class="btn btn-primary">View Pages</a>
                    <a href="{{ route('aag.pages.create') }}" class="btn btn-success">+ Create</a>
                    <div class="mt-5">
                        <a href="{{ route('aag.lp.exercise') }}" class="btn btn-secondary">Exercise LP - Lead Magnet</a>
                        <a href="{{ route('aag.email.leadmagnet.exercise.preview') }}" class="btn btn-secondary">LP - Lead Magnet Email Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
