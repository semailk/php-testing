<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property int $weight
 *
 * Class CatCollectionResource
 * @package App\Models
 */
class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'weight'
    ];

    public function coffees(): BelongsToMany
    {
        return $this->belongsToMany(Coffee::class,'cats_coffees','cat_id','coffee_id');
    }
}
