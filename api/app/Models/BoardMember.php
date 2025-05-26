<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardMember extends Model
{
    public function board(): BelongsTo {
        return $this->belongsTo(Board::class);
    }
}
