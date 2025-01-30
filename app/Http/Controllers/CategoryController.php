<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\DataTables\CmsDataTable;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $title = 'Category';
        $resource = 'category';
        $data = Category::getAllCategories();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'title',
            'resource',
            'data',
        ));
    }
    
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->store($data);

        return redirect()->route(Auth::user()->role . '.category.index')
            ->with('success', 'You have added a category successfully!');
    }
    
    public function edit(Category $category)
    {
        $title = 'Category';
        $resource = 'category';

        return view('cms.edit', compact(
            'title',
            'resource',
            'category',
        ));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $this->categoryService->update($data, $category);

        return redirect()->route(Auth::user()->role . '.category.edit', $category)
            ->with('success', 'You have updated a category successfully!');
    }
    
    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category);

        return redirect()->route(Auth::user()->role . '.category.index')
            ->with('success', 'You have deleted a category successfully!');
    }
}
