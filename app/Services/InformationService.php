<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class InformationService
{
    public static $posts;

    public static function InformationIndex()
    {
        static::$posts = Http::withoutVerifying()->withHeaders([])->get("https://bmtumy.com/wp-json/wp/v2/posts", [
            "per_page" => 15,
            "_embed" => ''
        ])->json();

        return self::paginate(static::$posts);
    }

    public static function InformationDetail($id)
    {
        $post = Http::withoutVerifying()->withHeaders([])->get("https://bmtumy.com/wp-json/wp/v2/posts", [
            "include[]" => $id,
            "_embed" => ''
        ])->json();

        $date = Carbon::parse($post[0]['date']);

        $postdetail = [
            "id"    => $id,
            "title" => $post[0]['title']['rendered'],
            "featured_image" => $post[0]['_embedded']['wp:featuredmedia'][0]['source_url'] ?? asset('images/noimage.jpg'),
            "content" => $post[0]['content']['rendered'],
            "date" => $date->isoFormat('D MMMM Y'),
            "link" => $post[0]['link'],
        ];

        return $postdetail;
    }

    private static function paginate($items, $perPage = 6, $currentPage = null, $options = [])
    {
        $currentPage = $currentPage ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($currentPage, $perPage),
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => route('information.index')],
        );
    }
}
