<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        try {
            $topnewslist = News::latest()->whereHas('category')->where('status',1)->take(5)->get();

            $newscategory_one   = News::latest()->whereHas('category')->where('category_id',6)->where('status',1)->take(9)->get();
            $newscategory_two   = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            $newscategory_three = News::latest()->whereHas('category')->where('category_id',3)->where('status',1)->take(10)->get();

            return view('frontend.index',compact(
                    'topnewslist',
                    'newscategory_one',
                    'newscategory_two',
                    'newscategory_three'
                )
            );
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function pageCategory($slug)
    {
        try {
            $category           = Category::where('slug',$slug)->first();
            $featurednewslist   = $category->newslist()->where('status',1)->where('featured',1)->take(5)->get();
            $newscategorylist   = $category->newslist()->where('status',1)->where('featured',0)->get();
            $advertisements     = Advertisement::where('type','category')->where('slug',$slug)->first();

            return view('frontend.pages.category',compact('category','featurednewslist','newscategorylist','advertisements'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function pageNews($slug)
    {
        try {
            $newssingle = News::with('category')->where('slug',$slug)->first();

            $newssessionkey = 'news-'.$newssingle->id;
            if(!session()->has($newssessionkey)){
                $newssingle->increment('view_count');
                session()->put($newssessionkey,1);
            }

            return view('frontend.pages.single',compact('newssingle'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function pageSearch()
    {
        try {
            $search = request()->input('search');

            $newssearch = News::with('category')->where('title','like','%'.$search.'%')->whereHas('category')->where('status',1)->get();

            return view('frontend.pages.search',compact('newssearch'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function pageArchive()
    {
        try {
            $newsarchives = Category::with('newslist')->whereHas('newslist')->get();

            return view('frontend.pages.index',compact('newsarchives'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
