<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function store(array $data): Category
    {
        return Category::create([
            'name'  =>  $data['name'],
            'remarks'  =>  $data['remarks'],
            'added_by'  =>  auth()->id(),
            'updated_by'  =>  auth()->id(),
        ]);
    }
    
    public function update(array $data, Category $category): void
    {
        $category->update([
            'name'  =>  $data['name'],
            'remarks'  =>  $data['remarks'],
            'updated_by'  =>  auth()->id(),
        ]);
    }

    public function destroy(Category $category): void
    {
        $category->delete();
    }
}