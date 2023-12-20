<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = "genders";
    protected $primaryKey = "id";

    use HasFactory;


    public function articles(){
        // hasManyThrough(related,throrgh)
        // return $this->hasManyThrough(Article::class,User::class);
    
        // hasManyThrough(related,throrgh,firstKey,secondKey)
        return $this->hasManyThrough(Article::class,User::class,"gender_id","user_id");
    
    }
}
