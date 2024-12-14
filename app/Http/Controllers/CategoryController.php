<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
        ]);

        $newCategoryData = [
            'name' => $request->get('name'),
            'user_id' => auth()->id(),
        ];

        Category::create($newCategoryData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:128',
        ]);

        $category = Category::where('id', $request->get('id'))->first();

        if ($category->user_id != auth()->id()) {
            return redirect()->route('categories.index')->with('error', 'Category cannot be edited!');
        }

        $category->name = $request->get('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }



    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function delete(Request $request)
    {
        $category = Category::where('id', $request->get('id'))->first();
        if ($category->user_id == auth()->id()) {
            try {
                $category->delete();
            } catch (QueryException $exception) {
                return redirect()->route('categories.index')->with('error', 'Something went wrong!' . $exception->getMessage());
            }

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category cannot be deleted!');
        }
    }
}
