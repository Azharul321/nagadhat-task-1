<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;

class SearchHistoryController extends Controller
{
    public function index()
    {
        $searchHistory = SearchHistory::with('user')->get();

        $keywords = SearchHistory::getKeywordsWithCounts();

        $uniqueUserIds = SearchHistory::getUniqueUsers();

        $users = User::whereIn('id', $uniqueUserIds)->get();

        return view('search_history', compact('searchHistory', 'keywords','users'));
    }
}
