<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{

    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search >= 2 )) {
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query=' . $this->search . '&api_key=65496bc66137fccb297cd6e812b6d401')
                ->json()['results'];


        }

        $searchResults = collect($searchResults)->take(7);

        return view('livewire.search-drop-down', compact('searchResults'));
    }
}
