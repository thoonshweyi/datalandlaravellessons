<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = "phones";
    protected $primaryKey = "id";

    protected $fillable = [
        "number",
        "user_id"
    ];
}
