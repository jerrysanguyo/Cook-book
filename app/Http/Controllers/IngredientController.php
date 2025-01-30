<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientType;
use App\Http\Requests\IngredientRequest;
use App\Services\IngredientService;
use App\DataTables\CmsDataTable;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    protected $ingredientService;

    public function __construct(IngredientService $ingredientService) 
    {
        $this->ingredientService = $ingredientService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $title = 'Ingredients';
        $resource = 'ingredient';
        $subData = IngredientType::getAllIngredientType();
        $data = Ingredient::getAllIngredient();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'subData',
            'data',
            'title',
            'resource',
        ));
    }
    
    public function store(IngredientRequest $request)
    {
        $data = $request->validated();
        $this->ingredientService->store($data);

        return redirect()->route(Auth::user()->role . '.ingredient.index')
            ->with('success', 'You have added an ingredient successfully!');
    }
    
    public function edit(Ingredient $ingredient)
    {
        $title = 'Ingredients';
        $resource = 'ingredient';
        $subData = IngredientType::getAllIngredientType();

        return view('cms.edit', compact(
            'ingredient',
            'title',
            'resource',
            'subData',
        ));
    }
    
    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();
        $this->ingredientService->update($data, $ingredient);

        return redirect()->route(Auth::user()->role . '.ingredient.edit', $ingredient)
            ->with('success', 'You have updated an ingredient successfully!');
    }
    
    public function destroy(Ingredient $ingredient)
    {
        $this->ingredientService->destroy($ingredient);

        return redirect()->route(Auth::user()->role . '.ingredient.index')
            ->with('success', 'You have deleted an ingredient successfully!');
    }
}
