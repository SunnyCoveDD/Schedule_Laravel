<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairs extends Model
{
    use HasFactory;
    protected $fillable = ([
        'number',
        'group_id',
        'subject_id',
        'user_id',
        'cabinet_id',
        'date_id',
    ]);

    public function group()
    {
        return $this->hasOne(Groups::class, 'id', 'group_id')->first()->name;
    }
    public function subject()
    {
        return $this->hasOne(Subjects::class, 'id', 'subject_id')->first()->name;
    }
    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first()->name;
    }
    public function cabinets()
    {
        return $this->hasOne(Cabinets::class, 'id', 'cabinet_id')->first()->number;
    }

}
