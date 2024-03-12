<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        try {
            $users = User::orderBy('name','desc')->where('role_id','!=',1)->get();

            return view('backend.users.index', compact('users'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function create()
    {
        try {
            return view('backend.users.create');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {   
        try {
            $request->validate([
                'name'      => 'required|string|max:190',
                'email'     => 'required|string|email|max:190|unique:users',
                'password'  => 'required|string|min:6',
                'role_id'   => 'required|numeric',
                'photo'     => 'image|mimes:jpg,png,jpeg'
              ]);
      
              if(isset($request->status)){
                  $status = true;
              }else{
                  $status = false;
              }
      
              if ($request->hasFile('photo')) {
                  $imageName = 'user-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
                  $request->photo->move(public_path('images'), $imageName);
              }else{
                  $imageName = "default.png";
              }
      
              User::create([
                  'name'      => $request->name,
                  'email'     => $request->email,
                  'password'  => bcrypt($request->password),
                  'role_id'   => $request->role_id,
                  'photo'     => $imageName,
                  'status'    => $status
              ]);
      
              return redirect()->route('admin.users.index')->with(['message' => 'User added successfully.']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $user = User::with('role')->findOrFail($id);

            return view('backend.users.edit', compact('user'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'      => 'required|string|max:250',
                'email'     => 'required|string|email|max:250',
                'role_id'   => 'required|numeric',
                'photo'     => 'image|mimes:jpg,png,jpeg'
              ]);
      
              if(isset($request->status)){
                  $status = true;
              }else{
                  $status = false;
              }
              
              $user = User::findOrFail($id);
      
              if ($request->hasFile('photo')) {
      
                  if(file_exists(public_path('images/') . $user->photo) && ($user->photo != 'default.png')){
                      unlink(public_path('images/') . $user->photo);
                  }
                  $imageName = 'user-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
                  $request->photo->move(public_path('images'), $imageName);
              }else{
                  $imageName = $user->photo;
              }
      
              $user->update([
                  'name'      => $request->name,
                  'email'     => $request->email,
                  'role_id'   => $request->role_id,
                  'photo'     => $imageName,
                  'status'    => $status
              ]);
      
              return redirect()->route('admin.users.index')->with(['message' => 'User updated successfully.']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            if(file_exists(public_path('images/') . $user->photo) && ($user->photo != 'default.png')){
                unlink(public_path('images/') . $user->photo);
            }

            $user->delete();

            return back()->with(['message' => 'User deleted successfully!']);
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
