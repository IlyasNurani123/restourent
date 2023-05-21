<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        if ($validatedData->fails()) {
            return \redirect()->back()->with('message', $validatedData->getMessageBag()->getMessages());
        }

        $path = $request->file('image')->store('public/images');
        $url = Storage::url($path);

        $category =  Category::create([
            "name" => $request->name,
            "description" => $request->description ?? null,
            "image" => $url ?? null
        ]);

        return redirect('/categories');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return \redirect()->back()->with('message', $validator->getMessageBag()->getMessages());
        }
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $url = Storage::url($path);
        }
        $category = Category::find($id);

        $category->update([
            "name" => $request->name,
            "description" => $request->description ?? null,
            "image" => $url ?? $category->image
        ]);

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
