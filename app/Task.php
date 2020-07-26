<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Task extends Model
{
    use Searchable;
    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return  $this->hasOne(User::class, 'user_id', 'id');
    }

    public function searchableAs()
    {
        return 'task_name';
    }

    public function getScoutKey()
    {
        return $this->task_name;
    }

    public function getScoutKeyName()
    {
        return 'task_name';
    }

}
