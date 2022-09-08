<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Http\Resources\CoffeeCollectionResource;
use App\Models\Coffee;
use App\Services\CoffeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CoffeeController extends Controller
{
    private CoffeeService $coffeeService;

    public function __construct(CoffeeService $coffeeService)
    {
        $this->coffeeService = $coffeeService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $coffees = Coffee::with('cats')->get();
        $coffees = new CoffeeCollectionResource($coffees);

        return \view('coffees.index', compact('coffees'));
    }

    /**
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $errors =  Validator::make($request->all(),CoffeeRequest::rules());
        if ($errors->fails()){
            return response()->json($errors->errors(), Response::HTTP_BAD_REQUEST);
        }
        $coffees = $this->coffeeService->search($request->search);

        return response()->json($coffees, Response::HTTP_OK);
    }
}
