<?php

namespace App\Models;

use App\Http\Middleware\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'lieu',
        'date',
        'category_id',
        'Number_places',
        'organisateur_id',
        'image',
    ];



    public function category()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }

    public function users () {
        return $this->belongsTo(user::class);
    }

    public function reservation () {
        return $this->hasmany(reservation::class , 'event_id');
    }
}
