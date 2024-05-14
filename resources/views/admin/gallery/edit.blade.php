@extends('admin.layout.layout')

@section('title', 'Edit Album')
@section('content')
     <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title ?? 'Edit Album' }}
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', route('album.update', $album->id))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            {!! html()->hidden('_method', 'PUT') !!}
            
            <div class="row">
                <!-- Title Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Title')->for('title') !!}
                        {!! html()->text('title')->class('form-control')->value(old('title', $album->title))->placeholder('Title') !!}
                    </div>
                </div>

                <!-- Current Image -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Current Image:</label><br>
                        <img src="{{ asset($album->images()->first()->image) }}" alt="Album Image" style="max-width: 100px;">
                    </div>
                </div>

                <!-- New Image Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('New Image')->for('new_image') !!}
                        {!! html()->file('new_image')->class('form-control') !!}
                        <small class="text-muted">Leave blank to keep the current image.</small>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update Album', 'submit')->class('btn btn-success') !!}
        </div>

        {!! html()->form()->close() !!}
    </div>
@endsection
