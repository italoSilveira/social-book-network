<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
	protected $table = "id";
    protected $guarded = ['id', 'created_at'];

    public function author()
    {
        return $this->hasMany('App\Author');
    }

    public function category()
    {
        return $this->hasMany('App\Category');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher');
    }
}
