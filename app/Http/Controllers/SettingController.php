<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $setting = Setting::first();

            return view('backend.settings.index',compact('setting'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {   
        try {
            $request->validate([
                'site_name'     => 'required|max:250',
                'site_logo'     => 'nullable|image|mimes:png',
                'site_favicon'  => 'nullable',
                'email'         => 'required|max:250',
                'facebook'      => 'nullable|url',
                'twitter'       => 'nullable|url',
                'linkedin'      => 'nullable|url',
                'vimeo'         => 'nullable|url',
                'youtube'       => 'nullable|url'
            ]);
    
            $setting = new Setting();
    
            if ($request->hasFile('site_logo')) {
                $site_logo = 'logo'.'.'.$request->site_logo->getClientOriginalExtension();
                $request->site_logo->move(public_path('images'), $site_logo);
            }elseif($request->site_logo){
                $site_logo = $request->site_logo;
            }else{
                $site_logo = 'logo.png';
            }
            
            if ($request->hasFile('site_favicon')) {
                $site_favicon = 'favicon'.'.'.$request->site_favicon->getClientOriginalExtension();
                $request->site_favicon->move(public_path('images'), $site_favicon);
            }elseif($request->site_favicon){
                $site_logo = $request->site_favicon;
            }else{
                $site_favicon = 'favicon.ico';
            }
    
            $setting->updateOrCreate(['id' => 1],
              [
                'site_name'     => $request->site_name,
                'site_logo'     => $site_logo,
                'site_favicon'  => $site_favicon,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'linkedin'      => $request->linkedin,
                'vimeo'         => $request->vimeo,
                'youtube'       => $request->youtube,
                'about_us'      => $request->about_us,
                'address'       => $request->address
              ]
            );
    
            $notification = array(
                'message'    => 'Settings updated successfully !'
            );
    
            return back()->with('success', 'Setting updated successfully.')->with($notification);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function breakingNews() 
    {
        try {
            $categories = Category::all();
            $setting    = Setting::first();
    
            return view('backend.settings.breaking-news',compact('categories','setting'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function storeBreakingNews(Request $request)
    {
        
        try {
            $request->validate([
                'breaking_news_category_id' => 'required',
            ]);

            $setting = new Setting();

            $setting->updateOrCreate(['id' => 1],
            [
            'breaking_news_category_id' => $request->breaking_news_category_id
            ]
            );

            return back()->with('message', 'Breaking news category updated successfully !');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
