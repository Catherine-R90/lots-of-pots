<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchResultView($search) {
        return "Hello search result view! $search";
    }
}
