<?php


namespace App\Services;


use App\Models\Coffee;
use Illuminate\Support\Collection;

class CoffeeService
{
    /**
     * @param $search
     * @return Collection
     */
    public function search($search): Collection
    {
        $coffees = Coffee::with('cats');

        if (!empty($search) || !isset(\request()->due)) {
            $coffees = $coffees->where('name', 'LIKE', "%{$search}%")
                ->orWhere('type_name', 'LIKE', "%{$search}%")
                ->orWhere('calories', 'LIKE', "%{$search}%")
                ->orWhereRelation('cats','name','LIKE',"%{$search}%")
                ->get();
        } elseif (isset(\request()->due) && isset(\request()->from)) {
            $coffees = $coffees->whereBetween('calories', [\request()->due, \request()->from])
                ->orderBy('calories')->get();
        }

        return $coffees;
    }
}
