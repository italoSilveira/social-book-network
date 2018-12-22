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
