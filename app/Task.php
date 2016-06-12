<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $appends = ['time', 'pay'];
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
    public function files()
    {
    	return $this->hasMany('App\File');
    }

    public function tags()
    {
        return  $this->hasMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function getTimeAttribute()
    {
        switch ($this->due)
        {
            case 1:
                return "3天以内";
                break;
            case 2:
                return "一周以内";
                break;
            case 3:
                return "两周以内";
                break;
            case 4:
                return "2周以上";
                break;
            default:
                return '没有期限';
        }
    }
    public function getPayAttribute()
    {
        switch ($this->budget)
        {
            case 1:
                return "100元以内";
                break;
            case 2:
                return "500元以内";
                break;
            case 3:
                return "1000元以内";
                break;
            case 4:
                return "3000元以内";
                break;
            case 5:
                return "高于3000元";
                break;
            default:
                return '没有定价';
        }
    }
}
