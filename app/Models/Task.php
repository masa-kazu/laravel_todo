<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

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
}
