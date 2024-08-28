<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * プロジェクト一覧画面表示
     */
    public function index()
    {
        return view('projects.index');
    }
}
