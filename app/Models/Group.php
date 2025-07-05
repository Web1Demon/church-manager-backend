<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members() {
        return $this->belongsToMany(Member::class, 'group_member');
    }
}
