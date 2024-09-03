@extends('layouts.layout')

@section('title')
    プロジェクト作成
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">プロジェクト作成</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf

                            <div class="form-group d-flex flex-column flex-md-row">
                                <label for="project_name" class="col-md-4 col-form-label text-md-right">プロジェクト名：</label>
                                <div class="col-md-6">
                                    <input id="project_name" type="type" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>
                                    @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex mt-3 mb-0">
                                <div class="col-md-10 col-12 d-flex justify-content-end">
                                    <a href="{{ route('projects.index') }}" class="mr-3 btn btn-secondary">戻る</a>
                                    <button type="submit" class="btn btn-primary">作成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
