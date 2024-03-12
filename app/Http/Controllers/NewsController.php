<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    public function index()
    {
        try {
            $newslist = News::with('category')->latest()->get();

            return view('backend.news.index', compact('newslist'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function create()
    {
        try {
            $categories = Category::latest()->select('id','name')->where('status',1)->get();

            return view('backend.news.create', compact('categories'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'         => 'required|unique:news|max:255',
                'details'       => 'required',
                'category_id'   => 'required',
                'image'         => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            if(isset($request->status)){
                $status = true;
            }else{
                $status = false;
            }
    
            if(isset($request->featured)){
                $featured = true;
            }else{
                $featured = false;
            }
    
            if ($request->hasFile('image')) {
                $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
            }
    
            News::create([
                'title'         => $request->title,
                'slug'          =>  Str::slug($request->title),
                'details'       => $request->details,
                'category_id'   => $request->category_id,
                'image'         => $imageName,
                'status'        => $status,
                'featured'      => $featured
            ]);
    
            return redirect()->route('admin.news.index')->with(['message' => 'News created successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function show(News $news)
    {
        //
    }


    public function edit(News $news)
    {
        try {
            $categories = Category::latest()->select('id','name')->where('status',1)->get();
            $news       = News::findOrFail($news->id);

            return view('backend.news.edit', compact('categories','news'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

 
    public function update(Request $request, News $news)
    {
        try {
            $request->validate([
                'title'         => 'required|max:255',
                'details'       => 'required',
                'category_id'   => 'required',
                'image'         => 'image|mimes:jpg,png,jpeg'
            ]);
    
            if(isset($request->status)){
                $status = true;
            }else{
                $status = false;
            }
    
            if(isset($request->featured)){
                $featured = true;
            }else{
                $featured = false;
            }
    
            $news = News::findOrFail($news->id);
    
            if ($request->hasFile('image')) {
    
                if(file_exists(public_path('images/') . $news->image)){
                    unlink(public_path('images/') . $news->image);
                }
    
                $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
    
            }else{
                $imageName = $news->image;
            }
    
            $news->update([
                'title'         => $request->title,
                'slug'          =>  Str::slug($request->title),
                'details'       => $request->details,
                'category_id'   => $request->category_id,
                'image'         => $imageName,
                'status'        => $status,
                'featured'      => $featured
            ]);
    
            return redirect()->route('admin.news.index')->with(['message' => 'News updated successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

 
    public function destroy(News $news)
    {
        try {
            $news = News::findOrFail($news->id);

            if(file_exists(public_path('images/') . $news->image)){
                unlink(public_path('images/') . $news->image);
            }

            $news->delete();

            return back()->with(['message' => 'News deleted successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
