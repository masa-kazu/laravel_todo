@extends('layouts.layout')

@section('title')
    プロジェクト一覧
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                        <p class="mb-0 h5">プロジェクト</p>
                        <a href="#" class="btn btn-primary">追加</a>
                    </div>
                    <table class="table table-hover mb-0">
                        <tbody class="text-center">
                            @foreach ($projects as $project)
                                <tr>
                                    <td><a href="#">{{ $project->project_name }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
