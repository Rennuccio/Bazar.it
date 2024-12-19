<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $subcategories = Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return redirect(route('subcategory.index'))->with('success', 'SottoCategoria inserita con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories=Category::all();
        return view('subcategory.edit', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update([
            'name' => $request->name,
            'category_id'=>$request->category_id,
        ]);
        return redirect(route('subcategory.index'))->with('success', 'SottoCategoria modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect(route('subcategory.index'))->with('success', 'SottoCategoria eliminata con successo');
    }
}
