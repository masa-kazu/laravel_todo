<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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

}
