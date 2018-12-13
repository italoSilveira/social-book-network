<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
	protected $table = "author";
    protected $guarded = ['id', 'created_at'];
}
