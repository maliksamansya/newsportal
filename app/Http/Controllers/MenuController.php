<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\News;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menus = Menu::orderBy('menuorder','asc')->get();

            return view('backend.menu.index', compact('menus'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
    
    
    public function create()
    {
        try {
            $categories = Category::with('newslist')->orderBy('name','asc')->get();
            $menus = Menu::where('parent_id',0)->orderBy('name','asc')->get();

            return view('backend.menu.create', compact('categories','menus'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'type'      => 'required',
                'name'      => 'required',
                'menu_url'  => 'required',
                'menuorder' => 'required',
                'parent_id' => 'required'
            ]);
    
            Menu::create([
                'type'      => $request->type, 
                'name'      => $request->name, 
                'menu_url'  => $request->menu_url, 
                'menuorder' => $request->menuorder, 
                'parent_id' => $request->parent_id
            ]);
    
            $notification = array(
                'message'    => 'Menu created successfully !', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('admin.menus.index')->with($notification);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function show(Menu $menu)
    {
        //
    }


    public function edit(Menu $menu)
    {
        try {
            $menus = Menu::where('parent_id',0)->orderBy('name','asc')->get();
        
            return view('backend.menu.edit', compact('menu','menus'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function update(Request $request, Menu $menu)
    {
        try {
            $request->validate([
                'name'      => 'required',
                'menu_url'  => 'required',
                'menuorder' => 'required',
                'parent_id' => 'required'
            ]);
    
            $menu->update([
                'name'      => $request->name, 
                'menu_url'  => $request->menu_url, 
                'menuorder' => $request->menuorder, 
                'parent_id' => $request->parent_id
            ]);
    
            $notification = array(
                'message'    => 'Menu updated successfully !'
            );
    
            return redirect()->route('admin.menus.index')->with($notification);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }


    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return back()->with(['message' => 'Menu deleted successfully.']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function getMenuItems()
    {
        try {
            $menutype = request()->input('menutype');

            switch ($menutype) {
                case 'category':
                    $menuitems = Category::select('id','name')->where('status',1)->orderBy('name','asc')->get();
                    break;

                case 'news':
                    $menuitems = News::select('id','title as name')->where('status',1)->orderBy('title','asc')->get();
                    break;
                
                default:
                    $menuitems = [];
                    break;
            }

            return response()->json([ 'menuitems' => $menuitems ]);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function getMenuItemsDetails()
    {    
        try {
            if (request()->has(['menutype', 'menuitemid'])) {

                $menutype   = request()->input('menutype');
                $menuitemid = request()->input('menuitemid');
    
                switch ($menutype) {
                    case 'category':
                    $menudetails = Category::findOrFail($menuitemid);
                    break;
                    
                    case 'news':
                    $menudetails = News::findOrFail($menuitemid);
                    break;
                    
                    default:
                    $menudetails = [];
                    break;
                }
            }
    
            if(request()->ajax()){
    
                return response()->json([ 'menudetails' => $menudetails ]);
            }
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
