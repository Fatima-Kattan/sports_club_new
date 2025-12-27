<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'quantity',
        'status',
        'category_id',
    ];

    protected $casts = [
        'quantity' => 'integer'
    ];

    //Relationship to classification
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //Relationship with activities  
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_item', 'item_id', 'activity_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

}
