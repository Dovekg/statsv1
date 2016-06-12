<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['file_path', 'file_mime', 'file_ori_name'];

    public function task()
    {
    	return $this->belongsTo('App\Task');
    }
}
