<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['activity_id', 'media_type', 'media_url', 'uploaded_at'];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
