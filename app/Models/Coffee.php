<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $type_name
 * @property int $calories
 *
 * Class Coffee
 * @package App\Models
 */
class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_name',
        'calories'
    ];

    public function cats(): BelongsToMany
    {
        return $this->belongsToMany(Cat::class,'cats_coffees','coffee_id','cat_id');
    }
}
