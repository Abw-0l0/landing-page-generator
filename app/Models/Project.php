<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'template_id',
        'name',
        'content',
        'is_published',
        'published_url',
        'last_edited_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'last_edited_at' => 'datetime',
    ];

    /**
     * Get the user that owns the project.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the template that the project was created from.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Update the last_edited_at timestamp.
     */
    public function touchLastEdited(): void
    {
        $this->update(['last_edited_at' => now()]);
    }
}
