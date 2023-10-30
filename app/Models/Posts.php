<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    const TITLE = 'title';
    const DESC = 'desc';
    const POST_IMG = 'post_img';
    const USER_ID = 'user_id';
    const SLUG = 'slug';

    protected $fillable = [
        self::DESC,
        self::SLUG,
        self::TITLE,
        self::POST_IMG,
        self::USER_ID
    ];
}
