<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::search()->paginate(4)->withQueryString();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $request->validated();
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $request->validated();
        $category->update($request->all());
        return redirect()->route('category.index')->with('success', 'Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->products->count() > 0) {
            return redirect()->back()->with('error', 'Deleted unsuccessfully because of being linked to the book(s) in store');
        } else {
            $category->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        }
    }
    public function deleted()
    {
        $categories = Category::onlyTrashed()->paginate(4);
        return view('admin.category.deleted_list', compact('categories'));
    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return redirect()->route('category.index')->with('success', 'Restore Successfully');
    }
    public function delete($id)
    {
        Category::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted Successfully');
    }
}
