@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-dark container">
                <div class="card-header">Edit</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Base</div>
                                    <div class="card-body">
                                        <div class="bs-component">
                                            <fieldset>
                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name">name</label>
                                                    <input type="text"
                                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                           id="name" name="name" value="{{ old('name') ? old('name') : $map->name }}"
                                                           required autofocus>
                                                    @if ($errors->has('name'))
                                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                    <label for="title">title</label>
                                                    <input type="text"
                                                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                           id="title" name="title" value="{{ old('title') ? old('title') : $map->title }}"
                                                           required autofocus>
                                                    @if ($errors->has('title'))
                                                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('describe') ? ' has-error' : '' }}">
                                                    <label for="describe">describe</label>
                                                    <textarea   class="form-control {{ $errors->has('describe') ? ' is-invalid' : '' }}"
                                                                id="describe" name="describe" required autofocus>{{ old('describe') ? old('describe') : $map->describe }}</textarea>
                                                    @if ($errors->has('describe'))
                                                        <div class="invalid-feedback">{{ $errors->first('describe') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('version') ? ' has-error' : '' }}">
                                                    <label for="version">version</label>
                                                    <input type="text"
                                                           class="form-control {{ $errors->has('version') ? ' is-invalid' : '' }}"
                                                           id="version"
                                                           name="version"
                                                           value="{{ old('version') ? old('version') : $map->version }}"
                                                           required autofocus>
                                                    @if ($errors->has('version'))
                                                        <div class="invalid-feedback">{{ $errors->first('version') }}</div>
                                                    @endif
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Upload</div>
                                    <div class="card-body">
                                        <div class="bs-component">
                                            <fieldset>
                                                <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                                                    <label for="file">Map File</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file">
                                                        <label class="custom-file-label" for="file">Choose Map file</label>
                                                        @if ($errors->has('file'))
                                                            <div class="invalid-feedback">{{ $errors->first('file') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $errors->has('cover') ? ' has-error' : '' }}">
                                                    <label for="cover">Cover</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input {{ $errors->has('cover') ? ' is-invalid' : '' }}" id="cover" name="cover">
                                                        <label class="custom-file-label" for="cover">Choose Cover</label>
                                                        @if ($errors->has('cover'))
                                                            <div class="invalid-feedback">{{ $errors->first('cover') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Upload</div>
                                    <div class="card-body">
                                        <div class="bs-component">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                                        </div>
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
                                    <div class="form-group {{ $errors->has('markdown') ? ' has-error' : '' }}">
                                        <textarea class="form-control {{ $errors->has('markdown') ? ' is-invalid' : '' }}"
                                                  id="markdown" rows="16" name="markdown"
                                                  style="margin-top: 0px; margin-bottom: 0px;"
                                                  required autofocus>{{ old('markdown') ? old('markdown') : $map->markdown }}</textarea>
                                        @if ($errors->has('markdown'))
                                            <div class="invalid-feedback">{{ $errors->first('markdown') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
@endsection
