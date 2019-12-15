@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-dark container">
            <div class="card-header">Welcome</div>
            <div class="card-body container">
                <h1>{{ $map->title }}</h1>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Author
                                        <span class="badge badge-primary badge-pill"><?php echo $map->author();?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Version
                                        <span class="badge badge-primary badge-pill">{{ $map->version }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-body">
                                <img style="max-height: 200px; width: 100%; display: block;" src="{{ Storage::url($map->storage('cover_file')) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <h3 class="card-header">Download</h3>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-lg" onclick="location.href='{{ route('download',['id'=>$map->id]) }}'">local</button>
                                @if($map->author==Auth::id())
                                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='{{ route('edit',['id'=>$map->id]) }}'">edit</button>
                                @endif
                            </div>
                            <div class="card-footer text-muted">
                                Size: {{ Storage::disk('local')->size($map->storage('map_file'))/1024/1024 }} MB
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="containers">README.md</h1>
                        </div>
                        <div class="bs-component">
                            <div class="jumbotron">
                                <?php
                                $Parsedown = new Parsedown();
                                echo $Parsedown->setSafeMode(true)->text($map->markdown);
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
