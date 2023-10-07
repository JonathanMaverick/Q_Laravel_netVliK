<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    public function home_page(){
        $films = Film::all();
        $user_id = session('curruser_id');
        $user = User::find($user_id);

        return view('home', compact('films', 'user'));
    }

    public function trending_page(){
        return view('trending');
    }

    public function favorite_page(){
        $user = Auth::user();
        return view('favorite', compact('user'));
    }

    public function search(Request $request){
        $films = Film::where('title', 'LIKE', '%' . $request->search_title . '%')->paginate(4);
        $search_data = $request->search_title;

        return view('search', compact('films', 'search_data'));
    }

    public function detail_film_page($id){
        $user = Auth::user();

        $film = Film::find($id);
        return view('PostPage.detail_film', compact('film', 'user'));
    }

    public function edit_film_page($id){
        $film = Film::find($id);
        return view('PostPage.edit_film', compact('film'));
    }

    public function edit_film(Request $request, $id)
    {
        $film = Film::find($id);

        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'genre' => 'required|string|max:255',
            'cast' => 'required|string|max:255',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $image_name = time().'.'.$img->getClientOriginalExtension();
            Storage::putFileAs("public/images", $img, $image_name);
            $image_url = 'images/'.$image_name;
            $film->url = $image_url;
        }

        $film->title = $request->title;
        $film->desc = $request->desc;
        $film->genre = $request->genre;
        $film->cast = $request->cast;
        $film->save();

        return redirect()->route('detail_film_page', ['id' => $id]);
    }

    public function delete_film($id){
        $film = Film::find($id);
        if (Storage::exists($film->url)) {
            Storage::delete($film->url);
        }
        $film->delete();

        return redirect()->route('home_page');
    }

    public function insert_film_page(){
        return view('PostPage.insert_film');
    }

    public function insert_film(Request $request){
        $film = new Film();

        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'genre' => 'required|string|max:255',
            'cast' => 'required|string|max:255',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        $img = $request->file('image');
        $image_name = time().'.'.$img->getClientOriginalExtension();
        Storage::putFileAs("public/images", $img, $image_name);
        $image_url = 'images/'.$image_name;
        $film->url = $image_url;

        $film->title = $request->title;
        $film->desc = $request->desc;
        $film->genre = $request->genre;
        $film->cast = $request->cast;
        $film->save();

        return redirect()->route('home_page');
    }

    public function addToFavorites($id)
    {
        $user_id = Auth::user()->id;
        $user = User::with('favorites')->find($user_id);

        $film = Film::find($id);
        $user->favorites()->attach($film);

        return redirect()->back();
    }

    public function removeFromFavorites($id)
    {
        $user_id = Auth::user()->id;
        $user = User::with('favorites')->find($user_id);

        $film = Film::find($id);
        $user->favorites()->detach($film);

        return redirect()->back();
    }

}
