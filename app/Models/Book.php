<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function buyed(){
        $count = User_book::where('user_id',Auth::id())->where('book_id',$this->id)->count();
        return $count > 0 ? true : false;
    }

}
