@extends('admin.layout.layout')

@section('title', 'Album Details')

@section('content')
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <a>{{ $title ?? 'Album Details' }}</a>
        </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Title:</strong> {{ $album->title }}</p>
            </div>
            <div class="col-md-12">
                <p><strong>Images:</strong></p>
                @foreach($album->images as $image)
                    <p>{{ $image->title }}</p>
                    <img src="{{ asset($image->image) }}" alt="Album Image" style="max-width: 200px;">
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    </div>
</div>
@endsection
