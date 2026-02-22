<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Méthode createBook
    public function create(Request $request)
    {
        // Validation des données

        $request->validate([
            'author_id' => ['required', 'unique:books,author_id', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string'],
            'summary' => ['required', 'string'],
            'copy_number' => ['required', 'integer'],
        ]
        );

        // Création de la ressource
        $book = Book::create($request->toArray());
        //dd($book);

        // Valeur retournées
        return new BookResource($book);

    }
}
