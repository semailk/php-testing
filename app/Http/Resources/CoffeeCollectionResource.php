<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CoffeeCollectionResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
          'id' => $this->id
        ];
    }
}
