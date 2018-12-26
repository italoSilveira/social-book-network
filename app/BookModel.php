<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
	protected $table = "book";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = false; 

    public function author()
    {
        return $this->belongsTo('App\AuthorModel');
    }

    public function category()
    {
        return $this->belongsTo('App\CategoryModel');
    }

    public function publisher()
    {
        return $this->belongsTo('App\PublisherModel');
    }

    public function uploadPicture($request){
        $nameFile = '';
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->file->extension();
            if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
            {
                $nameFile = "{$name}.{$extension}";
                $upload = $request->file->storeAs('book', $nameFile);
                if ( !$upload )
                    return null;
            }else{
                return null;
            }
        }
        return $nameFile;
    }
}
