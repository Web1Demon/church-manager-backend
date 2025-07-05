<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birthdate',
        'join_date',
        'worker_category',
        'ministry_group',
        'status',
    ];

    protected $casts = [
    'birthdate' => 'date',
    'join_date' => 'date',
];


    public function groups() {
        return $this->belongsToMany(Group::class, 'group_member');
    }

    // If you plan to link transactions or other models
    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class);
    // }
}
