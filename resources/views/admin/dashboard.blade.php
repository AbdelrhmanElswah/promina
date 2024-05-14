@extends('admin.layout.layout')

@section('title', 'Home Page')

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Feed section -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Album Additions</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($recentAlbums as $album)
                            <li class="list-group-item">{{ $album->title }} added on {{ $album->created_at->format('M d, Y') }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- Your existing content goes here -->
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection
