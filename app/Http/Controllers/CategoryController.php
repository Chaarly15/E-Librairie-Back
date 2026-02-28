<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Fonction d'enregistrement d'une catégory
    public function store(Request $request, Category $category)
    {
        // Validation des données
        $request->validate(
            [
                'label' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]
        );

        // Création de la catégorie
        $category = Category::crate($request->toArray());

        // Redirection
        return new CategoryResource($category);
    }

    // Fonction de mise à jour d'une catégorie
    public function update(Request $request, Category $category)
    {
        // Validation des données
        $request->validate(
            [
                'label' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]
        );

        // Mise à jour
        $category->update($request->toArray());

        return new CategoryResource($category);
    }

    // Fonction de suppression
    public function delete(Category $category)
    {
        $category->delete();

        return new CategoryResource($category);
    }

    // Fonction de recupération de toutes les catégories

}
