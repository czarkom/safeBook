<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;


class SharedMessage extends Model
{
    public function users(){
        $this->belongsToMany(User::class);
    }
}
