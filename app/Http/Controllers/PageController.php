<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Models\TestMovie;
use App\film;
use App\products;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ["key" => "home"]);
    }

    public function faq()
    {
        return view('faq', ["key" => "faq"]);
    }

    public function about()
    {
        return view('about', ["key" => "about"]);
    }

    public function masterdata()
    {
        $product = products::orderBy('product_id', 'desc')->get();
        return view('masterdata', ["key" => "masterdata", 'prod' => $product]);
    }

    public function vetted()
    {
        return view('password', ["key" => "password"]);
    }

    public function deleteproduct($product_id)
    {
        $product = products::find($product_id);
        if ($product) {
            \Storage::disk('public')->delete($product->product_image);
            $product->delete();
            return redirect('/masterdata')->with('alert', 'Product deleted successfully');
        }
        return redirect('/masterdata')->with('alert', 'Product not found');
    }

    public function editProduct($product_id)
    {
        $product = products::findOrFail($product_id);
        return view('edit', ["key" => "products", 'prod' => $product]);
    }




    public function saveproducts(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_stock' => 'required|integer',
            'product_category' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'listing_date' => 'required|date',
        ]);

        // Handle the file upload
        $file_name = time() . '-' . $request->file('product_image')->getClientOriginalName();
        $path = $request->file('product_image')->storeAs('product_images', $file_name, 'public');

        // Create a new product record
        products::create([
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
            'product_image' => $path,
            'listing_date' => $request->listing_date,
        ]);

        // Redirect back to the master data page with a success message
        return redirect('/masterdata')->with('alert', 'Data berhasil disimpan');
    }

    public function updateproduct($id, Request $request)
    {
        $product = products::find($id);

        $product->product_name = $request->product_name;
        $product->product_stock = $request->product_stock;
        $product->product_category = $request->product_category;
        $product->product_price = $request->product_price;
        $product->listing_date = $request->listing_date;

        if ($request->product_image) {
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }
            $file_name = time() . '-' . $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('product_images', $file_name, 'public');
            $product->product_image = $path;
        }

        $product->save();

        return redirect('/masterdata')->with('alert', 'Data berhasil diubah');
    }

    public function registrationpage()
    {
        return view('registration', ["key" => "registration"]);
    }

    public function loginpage()
    {
        return view('login', ["key" => "login"]);
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Optionally log the user in
        // Auth::login($user);

        // Redirect to the home page with a success message
        return redirect('/home')->with('success', 'Registration successful!');
    }
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Check if the user exists by email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect("/")->with('error', 'Email address not found.');
        }
    
        // Verify the password
        if (!Hash::check($request->password, $user->password)) {
            return redirect("/")->with('error', 'Incorrect password.');
        }
    
        // Attempt to log the user in
        Auth::login($user);
    
        // Authentication passed, redirect to home
        return redirect('/home');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }

    public function changePassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect("/userupdate")->with('error', 'The current password is incorrect.');
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with success message
        return redirect("/")->with('success', 'Password changed successfully.');
    }

    public function reset()
    {
        return view('reset', ["key"=>"reset"]);
    }

    public function resetPassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->with('error', 'No account found with that email.');
        }
    
        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect('/')->with('status', 'Password reset successfully.');
    }
    
}