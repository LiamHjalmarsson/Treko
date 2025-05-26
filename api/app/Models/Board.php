<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ["title", "user_id"];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function members(): HasMany {
        return $this->hasMany(BoardMember::class);
    }

    public function lists(): HasMany {
        return $this->hasMany(Table::class);
    }

    public function labels(): HasMany {
        return $this->hasMany(Label::class);
    }
}
