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
                            <tr>
                                <td class="table-active"><a href="#">プロジェクト1</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">プロジェクト2</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">プロジェクト3</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">プロジェクト4</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
