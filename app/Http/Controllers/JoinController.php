<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    public function innerJoin()
    {
        $data = DB::table('persons')
            ->join('posts', 'persons.id', '=', 'posts.person_id')
            ->select('persons.id', 'persons.name', 'persons.email', 'posts.id as post_id', 'posts.title', 'posts.content')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'INNER JOIN: Persons with Posts',
            'data' => $data,
        ]);
    }

    public function leftJoin()
    {
        $data = DB::table('persons')
            ->leftJoin('posts', 'persons.id', '=', 'posts.person_id')
            ->select('persons.id', 'persons.name', 'persons.email', 'posts.id as post_id', 'posts.title')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'LEFT JOIN: All Persons (with or without posts)',
            'data' => $data,
        ]);
    }

    public function rightJoin()
    {
        $data = DB::table('posts')
            ->rightJoin('persons', 'posts.person_id', '=', 'persons.id')
            ->select('posts.id as post_id', 'posts.title', 'persons.id', 'persons.name')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'RIGHT JOIN: Posts with Persons',
            'data' => $data,
        ]);
    }

    public function crossJoin()
    {
        $data = DB::table('persons')
            ->crossJoin('posts')
            ->select('persons.id', 'persons.name', 'posts.id as post_id', 'posts.title')
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'CROSS JOIN: All person-post combinations (limited to 10)',
            'data' => $data,
        ]);
    }

    public function multipleJoins()
    {
        $data = DB::table('posts')
            ->join('persons', 'posts.person_id', '=', 'persons.id')
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->select('persons.name', 'posts.title', 'comments.body')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Multiple JOINs: Persons > Posts > Comments',
            'data' => $data,
        ]);
    }
}
