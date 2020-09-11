@extends('AAG::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $page->exists ? 'Edit' : 'Create New' }} Page</div>
                <div class="card-body">
                    @if ($page->exists)
                    <form method='POST' action="{{ route('aag.pages.update', [
                        'page' => $page
                    ]) }}">
                        @method('PATCH')
                    @else
                    <form method='POST' action="{{ route('aag.pages.store') }}">
                    @endif
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Title <small>(required)</small></span>
                            </div>
                        <input type="text" class="form-control" aria-label="Title" name="title" value="{{ $page->title }}" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Description <small>(optional)</small></span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="description">{{ $page->description }}</textarea>
                        </div>
                        <div class="input-group mb-3 mt-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="type">Type</label>
                            </div>
                            <select class="custom-select" id="type" name="type" required>
                              <option selected value="lead_magnet">Lead Magnet</option>
                            </select>
                        </div>
                        <p>Call To Action Variance (A/B):</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Text <small>(required)</small></span>
                                    </div>
                                    <input type="hidden" name="cta_v1_id" value="{{ isset($page->versions['0']) ? $page->versions['0']->id : null }}">
                                    <input type="text" class="form-control" aria-label="Title" name="cta_text_1" required value="{{ isset($page->versions['0']) ? $page->versions['0']->cta_text : '' }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Text Color <small>(required)</small></span>
                                    </div>
                                    <input type="color" class="form-control" aria-label="CTA Color" name="cta_text_color_1" required value="{{ isset($page->versions['0']) ? $page->versions['0']->cta_text_color : '' }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Color <small>(required)</small></span>
                                    </div>
                                    <input type="color" class="form-control" aria-label="CTA Color" name="cta_color_1" required value="{{ isset($page->versions['0']) ? $page->versions['0']->cta_button_color : '' }}">
                                </div>
                            </div>
                            <div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Text v2<small>(optional)</small></span>
                                    </div>

                                    <input type="hidden" name="cta_v2_id" value="{{ isset($page->versions['1']) ? $page->versions['1']->id : null }}">
                                    <input type="text" class="form-control" aria-label="Title" name="cta_text_2" value="{{ isset($page->versions['1']) ? $page->versions['1']->cta_text : '' }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Text Color v2<small>(optional)</small></span>
                                    </div>
                                    <input type="color" class="form-control" aria-label="CTA Color" name="cta_text_color_2" value="{{ isset($page->versions['1']) ? $page->versions['1']->cta_text_color : '' }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">CTA Color v2<small>(optional)</small></span>
                                    </div>
                                    <input type="color" class="form-control" aria-label="CTA Color" name="cta_color_2" value="{{ isset($page->versions['1']) ? $page->versions['1']->cta_button_color : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3 mt-3">
                            <input type="submit" class="btn btn-primary" value={{ $page->exists ? 'UPDATE' : 'SAVE'}}>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
