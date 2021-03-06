<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'content',
        'filename',
        'file_hash',
        'is_encrypted',
        'password',
        'is_public'
        ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
