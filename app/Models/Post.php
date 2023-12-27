<?php

namespace App\Models ;

class Post
{
    private static $blog_posts = [
            [
                "title" => "Judul Post Pertama",
                "slug" => "judul-post-pertama",
                "author" => "Mulyani",
                "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio, in!"
            ],
            [
                "title" => "Judul Post Kedua",
                "slug" => "judul-post-kedua",
                "author" => "Raihan",
                "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore quos dolor aliquam iusto reprehenderit id!"
            ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        //$post = [];
        //foreach($posts as $p) {
            //if($p["slug"] === $slug) {
               // $post = $p;
        //}
     //}

        return $posts -> firstWhere('slug', $slug);
    }
}