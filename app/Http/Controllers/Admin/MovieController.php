<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gene;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        // $movies = Movie::orderByDesc('id')->paginate(10);
        $movies = Movie::orderByDesc('id')->when($search, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('Admim.movies.index', compact('movies'));
    }
    public function genes(){
        $genes =Gene::all();
        return view('Admim.movies.genes',compact('genes'));
    }
    public function store(Request $request){
        $data = $request->except('poster');
        $data['poster']= "";
        if($request->hasFile('poster')){
            $path_poster = $request->file('poster')->store('images');
            $data['poster']= $path_poster;
        }
        //luu
        Movie::query()->create($data);
        return redirect()->route('movie.index')->with('message', 'thêm thành công');
    }
    public function destroy(movie $movie){
        $movie->delete();
        return redirect()->route('movie.index')->with('message', 'xóa thành công');
    }
    public function edit(movie $movie){
        $genes = Gene::all();
        return view('Admim.movies.edit',compact('genes', 'movie'));
    }
    public function update(Request $request, movie $movie ){
        $data = $request->except('poster');
        $poster_old = $movie->poster;
        $data['poster']= $poster_old;
        if($request->hasFile('poster')){
            $path_poster = $request->file('poster')->store('images');
            $data['poster']= $path_poster;
        }
        $movie->update($data);
        if(file_exists('storage/'. $poster_old)){
            unlink('storage/'. $poster_old);
        }
        return redirect()->back()->with('message', 'cập nhật thành công');
    }
    public function detail(movie $movie){
        $genes = Gene::all();
        return view('Admim.movies.detail',compact('genes', 'movie'));
    }
}
