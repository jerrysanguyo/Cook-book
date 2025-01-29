<?php

namespace App\Http\Controllers;

use App\{
    Models\IngredientType,
    Services\IngredientTypeService,
    Http\Request\IngredientTypeRequest,
};
use Illuminate\Http\Request;

class IngredientTypeController extends Controller
{
    protected $ingredientTypeService;
    
    public function __construct(IngredientTypeService $ingredientTypeService)
    {
        $this->ingredientTypeService = $ingredientTypeService;
    }

    public function index()
    {
        return view('cms.index');
    }
    
    public function store(IngredientTypeRequest $request)
    {
        $data = $request->validated();
        $this->ingredientTypeService->store($data);

        return redirect()->route(Auth::user()->role . '.ingredientType.index')
            ->with('success', 'Ingredient type created successfully!');
    }
    
    public function edit(IngredientType $ingredientType)
    {
        return view('cms.edit', compact('ingredientType'));
    }
    
    public function update(IngredientTypeRequest $request, IngredientType $ingredientType)
    {
        $data = $request->validated();
        $this->ingredientTypeService->update($data, $ingredientType);

        return redirect()->route(Auth::user()->role . '.ingredientType.edit', $ingredientType)
            ->with('success', 'Ingredient type updated successfully!');
    }
    
    public function destroy(IngredientType $ingredientType)
    {
        $this->ingredientTypeService->destroy($ingredientType);

        return redirect()->route(Auth::user()->role . '.ingredientType.index')
            ->with('success', 'Ingredient type deleted successfully!');
    }
}
