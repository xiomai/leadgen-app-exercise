@extends('AAG::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">{{ $page->title}} - Page <br/> <span class="badge badge-info">{{ $page->description }}</span></div>
                <div class="card-body">
                    @php dump($page->toArray()) ; @endphp
                </div>
                <a href="{{ route('aag.pages.edit', [
                    'page' => $page
                ]) }}" class="btn btn-info">EDIT</a>
            </div>
        </div>
    </div>
</div>
@endsection
