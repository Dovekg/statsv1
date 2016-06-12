<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = ['id'];
    public function topics()
    {
        return $this->belongsTo('App\Task');
    }
}
