@extends('admin.layout.layout')

@section('title', 'Create Album')

@section('content')
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <a>{{ $title ?? 'Create Album' }}</a>
        </h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{ route('album.store') }}" enctype="multipart/form-data">
        @csrf
    
        <!-- Title Field -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>
    
        <!-- Image Field -->
        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
    
        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Album</button>
        </div>
    </form>
    
</div>
@endsection

@push('scripts')
<script>
Dropzone.autoDiscover = false;
jQuery(document).ready(function() {
  $("#dropzone").dropzone({
    url: "{{ route('album.store') }}", 
    paramName: "images", 
    maxFilesize: 2, 
    acceptedFiles: ".jpeg,.jpg,.png,.gif", 
    addRemoveLinks: true, 
    dictDefaultMessage: "Drop files here or click to upload...", 
    success: function(file, response) {
        console.log(response);
    },
    error: function(file, response) {
        console.log(response);
    }
  });
});
</script>
@endpush
