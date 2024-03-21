<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\News;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index()
    {
        try {
            // Todo fetch berita ter trending (view count terbanyak 1)
            // $trendingTopNews = News::with(['category' => function($query) {$query->select('name');}])->whereHas('category')->orderBy('view_count', 'desc')->first();
            $trendingTopNews = News::with('category')->whereHas('category')->orderBy('view_count', 'desc')->first();
            $trendingBottomNews = News::with('category')->whereHas('category')->orderBy('view_count', 'desc')->skip(1)->take(3)->get();
            $rightNews = News::with('category')->whereHas('category')->orderBy('view_count', 'desc')->skip(4)->take(5)->get();
            $weekAgo = Carbon::now()->subWeek(); // Mendapatkan tanggal satu minggu yang lalu
            $weeklyNews = News::where('created_at', '>=', $weekAgo)->orderBy('created_at', 'desc')->take(4)->get();
            $advNews = Advertisement::latest()->first();

            $weeklyPopularNews =  News::select('news.title', 'news.slug', 'news.created_at', 'categories.name as category_name')
                                ->join('categories', 'news.category_id', '=', 'categories.id')
                                ->where('news.created_at', '>=', $weekAgo)
                                ->orderBy('news.view_count', 'desc')
                                ->take(5)
                                ->get();

           
            $latestNews = News::select('news.title', 'news.slug', 'categories.name as category_name')
                                ->join('categories', 'news.category_id', '=', 'categories.id')
                                ->orderBy('news.created_at', 'desc')
                                ->paginate(4);                    

            // $data = News::paginate(10);
            // $newscategory_one   = News::latest()->whereHas('category')->where('category_id',6)->where('status',1)->take(9)->get();
            // $newscategory_two   = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // $newscategory_three = News::latest()->whereHas('category')->where('category_id',3)->where('status',1)->take(10)->get();
            // $newstabspopular = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // $newstabsrecent = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // return response()->json([
            //     'status' => 'success',
            //     'data' => [
            //         'weeklyPopularNews' => $weeklyPopularNews,
            //         // 'trendingBottomNews' => $trendingBottomNews
            //     ]
            // ]);
            return view('version2.frontend.index',compact(
                    'trendingTopNews',
                    'trendingBottomNews',
                    'rightNews',
                    'weeklyNews',
                    'advNews',
                    'weeklyPopularNews',
                    'latestNews'
                )
            );
            // return view('welcome',compact(
            //     'data'
            // )
            // );
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function pageCategory($slug)
    {
        try {
            // Ambil ID kategori berdasarkan nama kategori
            $categoryId = Category::where('slug', $slug)->value('id');
            // var_dump($categoryId);
            // Ambil 4 berita terbaru dari kategori yang dipilih
            $news = News::where('category_id', $categoryId)->orderBy('created_at', 'desc')->take(4)->get();

           // Kembalikan view partial untuk konten kategori
            // return View::make('version2.frontend.layout.partials.category-content', ['news' => $news]);
            return view('version2.frontend.layout.partials.category-content', compact('news'));


            // $category           = Category::where('slug',$slug)->first();
            // $featurednewslist   = $category->newslist()->where('status',1)->where('featured',1)->take(5)->get();
            // $newscategorylist   = $category->newslist()->where('status',1)->where('featured',0)->get();
            // $advertisements     = Advertisement::where('type','category')->where('slug',$slug)->first();

            // $newstabspopular = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // $newstabsrecent = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // $newscategory_one   = News::latest()->whereHas('category')->where('category_id',6)->where('status',1)->take(9)->get();
            // $newscategory_two   = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            // $newscategory_three = News::latest()->whereHas('category')->where('category_id',3)->where('status',1)->take(10)->get();


            // return view('frontend.pages.category',compact(
            //     'category','featurednewslist','newscategorylist','advertisements',
            //     'newstabspopular', 'newstabsrecent',
            //     'newscategory_one',
            //     'newscategory_two',
            //     'newscategory_three',
            // ));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function showCategoryPartial($slug){
        try {
            // Ambil ID kategori berdasarkan nama kategori
            $categoryId = Category::where('slug', $slug)->value('id');
            // Ambil 4 berita terbaru dari kategori yang dipilih
            // $news = News::where('category_id', $categoryId)->orderBy('created_at', 'desc')->take(4)->get();
            $news = News::with('category')->where('category_id', $categoryId)->orderBy('created_at', 'desc')->take(4)->get();
            // News::with('category')->whereHas('category')->orderBy('view_count', 'desc')->skip(4)->take(5)->get();
            return view('version2.frontend.layout.partials.category-content', compact('news'));

        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function showCategoryPagination($slug){
        try {
            // var_dump($slug);
            // Ambil ID kategori berdasarkan nama kategori
            $categoryId = Category::where('slug', $slug)->value('id');
            // Ambil 4 berita terbaru dari kategori yang dipilih
            // $news = News::where('category_id', $categoryId)->orderBy('created_at', 'desc')->take(4)->get();
            $news = News::with('category')->where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(4);
            // News::with('category')->whereHas('category')->orderBy('view_count', 'desc')->skip(4)->take(5)->get();
            return view('version2.frontend.layout.partials.category-pagination', compact('news'));

        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function showLatestNews(){

        $latestNews = News::select('news.title', 'news.slug', 'categories.name as category_name')
                                ->join('categories', 'news.category_id', '=', 'categories.id')
                                ->orderBy('news.created_at', 'desc')
                                ->paginate(4);
    }

    public function pageNews($slug)
    {
        try {
            $newssingle = News::with('category')->where('slug',$slug)->first();
            $newstabspopular = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            $newstabsrecent = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            $newscategory_one   = News::latest()->whereHas('category')->where('category_id',6)->where('status',1)->take(9)->get();
            $newscategory_two   = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
            $newscategory_three = News::latest()->whereHas('category')->where('category_id',3)->where('status',1)->take(10)->get();
            $advNews = Advertisement::latest()->first();

            $newssessionkey = 'news-'.$newssingle->id;
            if(!session()->has($newssessionkey)){
                $newssingle->increment('view_count');
                session()->put($newssessionkey,1);
            }

            return view('version2.frontend.pages.single',compact(
                'newssingle', 'newstabspopular', 'newstabsrecent',
                'newscategory_one',
                'newscategory_two',
                'newscategory_three',
                'advNews'
            ));
            // return response()->json($newssingle);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function pageSearch()
    {
        try {
            $search = request()->input('search');
            $advNews = Advertisement::latest()->first();
            $newssearch = News::with('category')->where('title','like','%'.$search.'%')->whereHas('category')->where('status',1)->get();
            return view('version2.frontend.pages.search',compact('newssearch', 'advNews'));
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

    public function about(){
        try {
            $advNews = Advertisement::latest()->first();
            $about = Setting::latest()->first();

            return view('version2.frontend.pages.about',compact('advNews','about'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function contact(){
        try {
            $advNews = Advertisement::latest()->first();
            $about = Setting::latest()->first();

            return view('version2.frontend.pages.contact',compact('about', 'advNews'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function category(){
        try {
            $advNews = Advertisement::latest()->first();

            return view('version2.frontend.pages.category',compact('advNews'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
