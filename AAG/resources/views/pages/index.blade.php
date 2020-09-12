@extends('AAG::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Pages</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">UID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Leads</th>
                                <th scope="col">Open Rate</th>
                                <th scope="col">CT Rate</th>
                                <th scope="col">Versions</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <th scope="row">{{ $page->id }}</th>
                                    <td>{{ $page->shortenedTitle }}</td>
                                    <td>{{ $page->type }}</td>
                                    <td>
                                        {{ $page->leads_count }}
                                        @if($page->leads_count)
                                            <a href="{{ route('aag.pages.download_leads', [
                                    'page' => $page
                                ]) }}">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-cloud-arrow-down" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $page->openRate['formatted'] }}<span
                                            class="badge badge-pill badge-light">{{ $page->openRate['opened'] }}</span>
                                    </td>
                                    <td>{{ $page->clickThroughRate['formatted'] }}<span
                                            class="badge badge-pill badge-light">{{ $page->clickThroughRate['opened'] }}</span>
                                    </td>
                                    <td>{{ $page->versions_count }}</td>
                                    <td>
                                        <a href="{{ route('aag.pages.show', [
                                'page' => $page
                            ]) }}" class="btn btn-info mx-1 btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-eye" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg></a>
                                        <a href="{{ route('aag.pages.download_leads', [
                                    'page' => $page
                                ]) }}" class="btn btn-info mx-1 btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-cloud-arrow-down" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                <path fill-rule="evenodd"
                                                    d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z" />
                                            </svg></a>
                                        <a href="{{ route('aag.pages.edit', [
                                'page' => $page
                            ]) }}" class="btn btn-info btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-pencil-square" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('aag.pages.create') }}" class="btn btn-success">+ Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
