@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-dark container">
            <div class="card-header">Home</div>
            <div class="card-body container">
                <h1>aaa</h1>
                <div class="row">
                    @foreach($maps as $map)
                        <div class="col-lg-4">
                            <div class="card border-primary mb-3">
                                <h3 class="card-header">{{ $map->name }}</h3>
                                <img style="height: 200px; width: 100%; display: block;" src="{{ Storage::url($map->storage('cover_file')) }}"/>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $map->title }}</h5>
                                    <h6 class="card-subtitle text-muted">{{ $map->describe }}</h6>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail',['id'=>$map->id]) }}" class="card-link">Details</a>
                                    <a href="{{ route('edit',['id'=>$map->id]) }}" class="card-link">Edit</a>
                                </div>
                                <div class="card-footer text-muted">
                                    {{ $map->version }} Powered by {{ $map->author() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">{{ $maps->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
