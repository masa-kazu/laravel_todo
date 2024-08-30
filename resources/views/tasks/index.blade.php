@extends('layouts.layout')

@section('title')
    タスク一覧
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="column col-md-8 offset-md-2 mt-md-0 mt-3">
                <div class="card">
                    <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                        <p class="mb-0 h5">タスク</p>
                        <a href="#" class="btn btn-primary">追加</a>
                    </div>
                    <table class="table table-hover mb-0">
                        <thead class="text-light" style="background-color: rgb(106, 106, 106)">
                            <tr class="text-center">
                                <th scope="col"style="width: 65%">タスク名</th>
                                <th scope="col" style="width: 15%">進捗</th>
                                <th scope="col" style="width: 20%">期限</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td><a href="#">{{ $task->task_name }}</a></td>
                                    <td><span class="d-inline badge bg-secondary">{{ $task->task_status }}</span></td>
                                    <td>{{ $task->due_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
