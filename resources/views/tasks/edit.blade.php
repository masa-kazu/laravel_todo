@extends('layouts.layout')

@section('title')
    タスク編集
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">タスク編集</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', [$task->project_id, $task->id]) }}">
                            @csrf

                            <div class="form-group d-flex flex-column flex-md-row">
                                <label for="task_name" class="col-md-4 col-form-label text-md-right">タスク名：</label>
                                <div class="col-md-6">
                                    <input id="task_name" type="type" class="form-control @error('task_name') is-invalid @enderror" name="task_name" value="{{ old('task_name', $task->task_name) }}" required autocomplete="task_name" autofocus>
                                    @error('task_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column flex-md-row mt-3">
                                <label for="task_status" class="col-md-4 col-form-label text-md-right">進捗：</label>
                                <div class="col-md-6">
                                    <select name="task_status" id="task_status" class="form-select @error('task_status') is-invalid @enderror">
                                        @foreach ($taskStatusStrings as $key => $taskStatusString)
                                            <option @if ($key == old('task_status', $task->task_status)) selected @endif value="{{ $key }}">{{ $taskStatusString }}</option>
                                        @endforeach
                                    </select>
                                    @error('task_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column flex-md-row mt-3">
                                <label for="due_date" class="col-md-4 col-form-label text-md-right">期限：</label>
                                <div class="col-md-6">
                                    <input id="due_date" type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date', $task->due_date) }}" required autocomplete="due_date" autofocus>
                                    @error('due_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex mt-3 mb-0">
                                <div class="col-md-10 col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">編集</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
