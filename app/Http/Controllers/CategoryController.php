<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //Backend
    public function form()
    {
       return view('backend.pages.categoryForm');
    }


    //Frontend
    public function index()
    {
       return view('frontend.pages.category');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'type_name' => 'required|string',
                'status' => 'required',
                'image' => 'nullable|image' // Add validation for image file
            ]);

            $image = null;

            if ($request->hasFile('image')) {
                $image = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $image, 'public');
            }

            Category::create([
                "type_name" => $request->type_name,
                "status" => $request->status,
                "slug" => Str::slug($request['type_name']),
                "image" => $image
            ]);

            return back()->withSuccess(['success' => 'Category Create Success!']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
    public function list()
    {
       return view('backend.pages.categoryList');
    }


}
