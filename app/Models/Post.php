<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'tieu_de',
        'anh',
        'catelogue_post_id',
        'noi_dung',
        'user_id',
        'slug'
    ];

    public function tags()
    {
        return $this->belongsToMany(TagPost::class,'post_tagpost');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function catelogue()
    {
        return $this->belongsTo(CateloguePost::class,'catelogue_post_id');
    }

}
