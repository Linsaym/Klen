<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'task_tags', 'task_id', 'tag_id');
    }
}
