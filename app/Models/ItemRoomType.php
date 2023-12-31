<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRoomType extends Model
{
    use HasFactory;


    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }

}
