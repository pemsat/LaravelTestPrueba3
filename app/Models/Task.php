<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model, Illuminate\Testing\Constraints\SoftDeletedInDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    /**
     * Get all of the comments for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /**
    * Get the user that owns the Task
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];
}
