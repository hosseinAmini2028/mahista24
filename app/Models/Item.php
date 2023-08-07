<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'image_gallery' => 'json',
        'social_links' => 'json',
        'contact_data' => 'json',
        'location' => 'json',
    ];
    public function roomTypes(){
        return $this->belongsToMany(RoomType::class,'item_room_types')->withPivot(['price','id']);
    }
}
