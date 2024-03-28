<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;
    protected $table = "progress";

    protected $fillable = [
        'weight',
        'measurements',
        'performance',
        'height',
        'status',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted(): void{

        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }
}
