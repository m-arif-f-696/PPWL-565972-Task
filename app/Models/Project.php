<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'tech',
        'link',
    ];

    public function scopeDraft(Builder $query): Builder {
        return $query->where('status', 'draft');
    }

    public function scopePublished(Builder $query): Builder{
        return $query->where('status', 'published');
    }

    public function scopeTrash(Builder $query): Builder{
        return $query->onlyTrashed();
    }
}
