<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::latest()->get();

            return view('backend.category.index', compact('categories'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function create()
    {
        try {
            return view('backend.category.create');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'   => 'required|unique:categories|max:255',
                'image'  => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            if(isset($request->status)){
                $status = true;
            }else{
                $status = false;
            }
    
            if ($request->hasFile('image')) {
                $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
            }
    
            Category::create([
                'name'   => $request->name,
                'slug'   =>  Str::slug($request->name),
                'image'  => $imageName,
                'status' => $status
            ]);
    
            return redirect()->route('admin.category.index')->with(['message' => 'Category created successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function show(Category $category)
    {
        //
    }

 
    public function edit(Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);

            return view('backend.category.edit', compact('category'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name'   => 'required|max:255',
                'image'  => 'image|mimes:jpg,png,jpeg'
            ]);
    
            if(isset($request->status)){
                $status = true;
            }else{
                $status = false;
            }
    
            $category = Category::findOrFail($category->id);
    
            if ($request->hasFile('image')) {
    
                if(file_exists(public_path('images/') . $category->image)){
                    unlink(public_path('images/') . $category->image);
                }
    
                $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
    
            }else{
                $imageName = $category->image;
            }
    
            $category->update([
                'name'   => $request->name,
                'slug'   =>  Str::slug($request->name),
                'image'  => $imageName,
                'status' => $status
            ]);
    
            return redirect()->route('admin.category.index')->with(['message' => 'Category updated successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function destroy(Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);

            if(file_exists(public_path('images/') . $category->image)){
                unlink(public_path('images/') . $category->image);
            }

            $category->delete();

            return back()->with(['message' => 'Category deleted successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
