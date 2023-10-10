<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchKeyword = $request->input('keyword');
        
        $searchResults = $this->performSearch($searchKeyword);

        // Store the search history
        $this->storeSearchHistory(auth()->user()->id, $searchKeyword, $searchResults);

        return view('search_results', compact('searchKeyword', 'searchResults'));
    }

    private function performSearch($keyword)
    {
   
        return User::where('name', 'LIKE', "%$keyword%")
        ->orWhere('email', 'LIKE', "%$keyword%")
        ->orWhere('id', 'LIKE', "%$keyword%")
        ->get();
    }

    // Store the search history entry
    private function storeSearchHistory($userId, $keyword, $results)
    {
        SearchHistory::create([
            'user_id' => $userId,
            'search_keyword' => $keyword,
            'search_time' => now(),
            'search_results' => json_encode($results), 
        ]);
    }
}
