<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected  $fillable =['slug','name','description'];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
