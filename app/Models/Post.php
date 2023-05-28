<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    
    // protected function status(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  (int) $value;
    //         set: fn ($value) =>  
    //     );
    // }
    
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = (int) $value;
    }

    // public function getActiveYesNoAttribute()
    // {
    //     return $this->status == 1 ? true : false;
    // }

    // // public function getStatusAttribute($value)
    // // {
    // //     $this->attributes['status'] = (Boolean) $value;
    // // }
    
    // protected $casts = [
    //     'status' => 'boolean',
    // ];
}
