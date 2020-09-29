<?php

namespace App\Models;

use App\Http\Traits\TasksTrait;
use App\Http\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    use TimestampsTrait;
    use TasksTrait;

    public function getDates() {
        return ['created_at', 'updated_at', 'due_date'];
    }
}