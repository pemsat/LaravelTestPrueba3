<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model, Illuminate\Testing\Constraints\SoftDeletedInDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    /**
     * Get all of the comments for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected $fillable = [
        'title',
        'description',
        'shared',
    ];

    /**
     * The roles that belong to the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sharedWith(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_user')->withPivot('permission');
    }
}
