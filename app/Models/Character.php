<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Character extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region',
        'server',
        'username',
        'faction',
        'achievement_points',
        'guild',
        'class',
        'avatar',
    ];

    protected $with = ['server'];

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }
}
