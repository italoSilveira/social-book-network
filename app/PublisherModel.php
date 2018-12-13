<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublisherModel extends Model
{
	protected $table = "pub_comp";
    protected $guarded = ['id', 'created_at'];
}
