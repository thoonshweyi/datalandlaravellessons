<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = "articles";

    const CREATED_AT = "created_date";
    const UPDATED_AT = "updated_date";

    protected $primaryKey = "id";
    // protected $primaryKey = "user_id";


    // Mass Assignment
    // to allow the columns to insert
    // Method 1
    // protected $fillable = [
    //     "title",
    //     "description",
    //     "user_id",
    //     "rating"
    // ];

    // Method 2
    protected $guarded = [];

    public function user(){
        return $this->belongsTo("App\Models\User");

        // return $this->belongsTo(User::class);
    }

    public function photos(){
        // morphMany(relativetable,name);
        return $this->morphMany(Photo::class,"imageable");
    }

    public function comments(){
        // morphMany(relativetable,name);
        return $this->morphMany(Comment::class,"commentable");
   }

    public function tags(){
        // morphedToMany(relatedtable,name);
        return $this->morphToMany(Tag::class,"taggable");
    }
}
