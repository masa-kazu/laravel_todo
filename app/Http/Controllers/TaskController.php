<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * プロジェクトに紐づくタスク一覧
     */
    public function index($id)
    {
        // URLで送られてきたプロジェクトID
        $currentProjectId = $id;

        // プロジェクト取得
        $project = Project::find($currentProjectId);

        // 取得したプロジェクトに紐づくタスクを取得
        $tasks = $project->tasks->all();

        return view('tasks.index', compact(
            'currentProjectId',
            'tasks',
        ));
    }
    /**
     * タスク作成画面
     */
    public function create($id)
    {
        // URLで送られてきたプロジェクトID
        $currentProjectId = $id;

        return view('tasks.create', compact(
            'currentProjectId',
        ));
    }

    /**
     * タスク作成処理
     */
    public function store(StoreTaskRequest $request, $id)
    {
        // URLで送られてきたプロジェクトID
        $currentProjectId = $id;

        // トランザクション開始
        DB::beginTransaction();

        try {
            // タスク作成処理
            $task = Task::create([
                'project_id' => $currentProjectId,
                'task_name' => $request->task_name,
                'due_date' => $request->due_date,
            ]);

            // トランザクションコミット
            DB::commit();
        } catch(\Exception $e) {
            // トランザクションロールバック
            DB::rollBack();

            // ログ出力
            Log::debug($e);

            // エラー画面遷移
            abort(500);
        }

        return redirect()->route('tasks.index', [
            'id' => $currentProjectId,
        ]);
    }
    /**
     * タスク編集画面
     */
    public function edit($id, $taskId)
    {
        // タスクを取得
        $task = Task::find($taskId);

        // 進捗のテキスト(Taskモデルの定数取得)
        $taskStatusStrings = Task::TASK_STATUS_STRING;

        // 進捗のクラス(Taskモデルの定数取得)
        $taskStatusClasses = Task::TASK_STATUS_CLASS;

        return view('tasks.edit', compact(
            'task',
            'taskStatusStrings',
            'taskStatusClasses',
        ));
    }
    /**
     * タスク編集処理
     */
    public function update(Request $request, $id, $taskId)
    {
        // URLで送られてきたプロジェクトID
        $currentProjectId = $id;

        // タスクを取得
        $task = Task::find($taskId);

        // タスク編集処理(fill)
        $task->fill([
            'task_name' => $request->task_name,
            'task_status' => $request->task_status,
            'due_date' => $request->due_date,
        ]);

        // タスク編集処理(save)
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $currentProjectId,
        ]);
    }

}
