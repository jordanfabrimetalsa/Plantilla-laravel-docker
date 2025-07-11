<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    public function index()
    {
       $response = Http::get('https://jsonplaceholder.typicode.com/posts');
       $data = $response->json();
       if($response->successful()){
           return response()->json([
               'title' => $data['title'],
               'body' => $data['body']
           ], 200);
       }
       return response()->json([
           'error' => 'No se pudo obtener los posts'
       ], 404);
    }

    public function store(Request $request)
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', $request->all());
        $data = $response->json();
        if($response->successful()){
            return response()->json([
                'title' => $data['title'],
                'body' => $data['body']
            ], 200);
        }
        return response()->json([
            'error' => 'No se pudo crear el post'
        ], 404);
    }

    public function show(string $id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);
        $data = $response->json();
        if($response->successful()){
            return response()->json([
                'title' => $data['title'],
                'body' => $data['body']
            ], 200);
        }
        return response()->json([
            'error' => 'No se pudo obtener el post'
        ], 404);
    }

    public function update(Request $request, string $id)
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/' . $id, $request->all());
        $data = $response->json();
        if($response->successful()){
            return response()->json([
                'title' => $data['title'],
                'body' => $data['body']
            ], 200);
        }
        return response()->json([
            'error' => 'No se pudo actualizar el post'
        ], 404);
    }

    public function destroy(string $id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/' . $id);
        if($response->successful()){
            return response()->json([
                'message' => 'Post eliminado correctamente'
            ], 200);
        }
        return response()->json([
            'error' => 'No se pudo eliminar el post'
        ], 404);
    }
}
