@extends('AAG::layouts.mail_blank')

@section('content')
    <main class="w-75 m-auto">
        <div class="mt-3 p-3 bg-primary text-center text-white">
            <h1>{{ config('app.name') }}</h1>
        </div>
        <div class="content pt-3 px-5">
            <p class="pb-2">Hi there!</p>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at dui at felis bibendum consectetur sed eget erat. Nullam consectetur libero ac augue feugiat, sed sagittis mauris blandit.</p>
            <div class="w-100 text-center pb-2">
                <button class="btn btn-primary">DOWNLOAD LIST</button>
            </div>
            <p class="pb-2">Thanks and Safe Cleaning!</p>
        </div>
    </main>
    <footer class="w-75 m-auto bg-secondary py-3">
        <p class="text-center text-white text-bold">All Rights Reserve {{ now()->format('Y') }} &copy; {{ config('app.name') }}</p>
    </footer>
@endsection
