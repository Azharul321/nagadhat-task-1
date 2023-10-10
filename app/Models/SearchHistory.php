<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'search_keyword',
        'search_results',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public static function getKeywordsWithCounts()
{
    return DB::table('search_histories')
        ->select('search_keyword', DB::raw('COUNT(*) as count'))
        ->groupBy('search_keyword')
        ->get();
}

public static function getUniqueUsers()
{
    return DB::table('search_histories')
        ->select('user_id')
        ->distinct()
        ->pluck('user_id');
}


}
