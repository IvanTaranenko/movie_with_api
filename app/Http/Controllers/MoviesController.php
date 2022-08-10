<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
//     $popularMovies =Http::withToken(config('services.mdb.token'))
//        ->get('https://api.themoviedb.org/3/movie/popular')
//     ->json();
//
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=65496bc66137fccb297cd6e812b6d401')
            ->json()['results'];

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=65496bc66137fccb297cd6e812b6d401&language=en-US')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=65496bc66137fccb297cd6e812b6d401&language=en-US')
            ->json()['results'];


        dump($nowPlayingMovies);

        return view('index', compact('popularMovies', 'genres', 'nowPlayingMovies'));
    }

    public function show($id)
    {

        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=65496bc66137fccb297cd6e812b6d401&language=en-US&append_to_response=credits,videos,images')
            ->json();


        dump($movie);
        return view('show', compact('movie'));
    }
}
