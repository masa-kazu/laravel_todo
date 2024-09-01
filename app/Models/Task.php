<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TASK_STATUS_STRING = [
        '未対応',
        '処理中',
        '処理済み',
        '完了',
    ];

    const TASK_STATUS_CLASS = [
        'bg-danger',
        'bg-primary',
        'bg-success',
        'bg-secondary',
    ];

    protected $fillable = [
        'project_id',
        'task_name',
        'due_date',
        'task_status',
    ];

    /**
     * Projectsテーブルとのリレーション
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * 進捗のテキスト用アクセサ
     */
    public function getTaskStatusStringAttribute()
    {
        $taskStatus = $this->attributes['task_status'];

        if (!isset(self::TASK_STATUS_STRING[$taskStatus])) {
            return '';
        }

        return self::TASK_STATUS_STRING[$taskStatus];
    }

    /**
     * 進捗のBootstrapクラス用アクセサ
     */
    public function getTaskStatusClassAttribute()
    {
        $taskStatus = $this->attributes['task_status'];

        if (!isset(self::TASK_STATUS_CLASS[$taskStatus])) {
            return '';
        }

        return self::TASK_STATUS_CLASS[$taskStatus];
    }
}
