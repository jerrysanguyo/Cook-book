<?php

namespace App\Http\Controllers;

use App\Models\IngredientType;
use App\Http\Requests\IngredientTypeRequest;
use App\Services\IngredientTypeService;
use App\DataTables\CmsDataTable;
use Illuminate\Support\Facades\Auth;

class IngredientTypeController extends Controller
{
    protected $ingredientTypeService;
    
    public function __construct(IngredientTypeService $ingredientTypeService)
    {
        $this->ingredientTypeService = $ingredientTypeService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $title = 'Ingredient Type';
        $resource = 'ingredientType';
        $data = IngredientType::getAllIngredientType();
        
        return $dataTable->render('Cms.index', compact(
            'dataTable',
            'data',
            'title',
            'resource',
        ));
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
        $title = 'Ingredient Type';
        $resource = 'ingredientType';
    
        return view('cms.edit', compact(
            'ingredientType', 
            'title',
            'resource',
        ));
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
