<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'asc')->get();

        return view('category.index', ['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['category'] = $this->category->find($id);

        return view('category.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = $this->category->find($id);
        $category->update(array_merge($category->toArray(), $request->toArray()));

        return redirect('category')->with('message', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->find($id);
        $category->delete();
        
        return redirect('category')->with('message', 'Category deleted successfully!');
    }
}
