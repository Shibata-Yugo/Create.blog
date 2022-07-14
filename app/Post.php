<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 10)
{
    return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
   }
   protected $fillable = [ 'title',
                           'body',
                           'user_id'
  ];
  
  public function user()
    {   
    return $this->belongsTo('App\User');
    }
}