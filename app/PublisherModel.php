<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublisherModel extends Model
{
	protected $table = "publisher";
    protected $guarded = ['id', 'created_at'];
}
