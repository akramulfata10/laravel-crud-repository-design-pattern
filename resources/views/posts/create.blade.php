@extends('master')
@section('content')
    @php
        $view = $isView ?? false;
        $edit = $isEdit ?? false;
    @endphp

    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6 col-12 m-auto">
                <form action="{{ $edit ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
                    class="w-100">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title"> {{ $view ? 'View' : ($edit ? 'Update' : 'Create') }} Post</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group my-2">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" @if ($view) disabled @endif
                                    class="form-control" id="title" required
                                    value="{{ old('title') ?? ($post->title ?? '') }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                                <textarea name="content" @if ($view) disabled @endif class="form-control" id="content" required>{{ old('content') ?? ($post->content ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>

                            @if (!$view)
                                <button type="submit" class="btn btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
