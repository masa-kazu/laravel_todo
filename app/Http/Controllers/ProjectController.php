<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * プロジェクト一覧画面表示
     */
    public function index()
    {
        // ログインユーザーが作成した全てのプロジェクトを取得
        $projects = Auth::user()->projects->all();

        return view('projects.index', compact('projects'));
    }
    /**
     * プロジェクト作成画面
     */
    public function create()
    {
        return view('projects.create');
    }
}
