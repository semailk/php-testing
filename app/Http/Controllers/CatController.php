<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Models\Cat;
use App\Http\Resources\CatCollectionResource;
use App\Services\CatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CatController extends Controller
{
    private CatService $catService;

    public function __construct(CatService $catService)
    {
        $this->catService = $catService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $cats = Cat::with('coffees')->get();
        $cats = new CatCollectionResource($cats);

        return \view('cats.index', compact('cats'));
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
        $cats = $this->catService->search($request->search);

        return response()->json($cats, Response::HTTP_OK);
    }
}
