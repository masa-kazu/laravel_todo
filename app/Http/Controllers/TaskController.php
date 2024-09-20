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

}
