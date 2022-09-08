<?php


namespace App\Services;


use App\Models\Cat;
use Illuminate\Support\Collection;

class CatService
{
    /**
     * @param $request
     * @return Collection
     */
    public function search($request): Collection
    {
        $cats = Cat::with('coffees')
            ->where('name', 'LIKE', "%{$request}%")
            ->orWhere('weight', 'LIKE', "%{$request}%")
            ->orWhereRelation('coffees', 'name', 'LIKE', "%{$request}%")
            ->get();

        return $cats;
    }
}
