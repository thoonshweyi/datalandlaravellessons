<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function article(){
        // Method 1
        return $this->hasOne("App\Models\Article");
    
        // Method 2
        // return $this->hasOne(Article::class);
        // *method is prefered
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function roles(){
        // = Obey by naming conversion
        // return $this->belongsToMany(Role::class); 

        // = For Custom Table Name
        // belongsToMany(primarytable,secondarytable,secondarytable_fk,primarytable_fk)

        return $this->belongsToMany(Role::class,"userroles","user_id","role_id");
    }

    // => belongsToMany with withPivot()
    public function rolecreatedate(){
        // belongsToMany(related,table,foreignPivotKey,relativePivotKey)

        // return $this->belongsToMany(Role::class)->withPivot("created_at"); // Error Base table or view not found: role_user doesn't exist
    
        return $this->belongsToMany(Role::class,"userroles","user_id","role_id")->withPivot("created_at"); 
    
    }

    public function photos(){
        // morphMany(relativetable,name);
        return $this->morphMany(Photo::class,"imageable");
    }

    public function comments(){
        // morphMany(relativetable,name);
        return $this->morphMany(Comment::class,"commentable");
   }

    public function phone(){
        return $this->hasOne(Phone::class);
    }


    public function countries(){
        return $this->hasMany(Country::class);
    }
}
