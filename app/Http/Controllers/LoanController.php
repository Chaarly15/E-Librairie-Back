<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    // Fonction de création d'un emprunt
    public function store(Request $request)
    {
        // Validation des données
        $request->validate(
            [
                'book_id' => ['required', 'integer'],
                'user_id' => ['required', 'integer'],
                'loan_date' => ['required', 'date'],
                'return_date' => ['required', 'date'],
                'status' => ['required', 'enum'],
            ]
        );

        // Création de l'emprunt
        $loan = Loan::create($request->toArray());

        // Redirection
        return new LoanResource($loan);
    }

    // Fonction de mise à jour d'un emprunt
    public function update(Request $request, Loan $loan)
    {
        // Validation des données
        $request->validate(
            [
                'book_id' => ['required', 'integer'],
                'user_id' => ['required', 'integer'],
                'loan_date' => ['required', 'date'],
                'return_date' => ['required', 'date'],
                'status' => ['required', 'enum'],
            ]
        );

        // Requête de mise à jours des données
        $loan->update($request->toArray());

        return new LoanResource($loan->refresh());

    }

    // Fonction de lecture des tous les emprunt
    public function index()
    {
        $user = Auth::user();
        $loans = Loan::currentUserLoans($user->id)->get();

        return LoanResource::collection($loans);
    }

    // Fonction de lecture d'un emprunt
    public function show($id)
    {
        $loan = Loan::findOrFail($id);

        return new LoanResource($loan);
    }

    // Fonction de suppression
    public function delete(Loan $loan)
    {
        $loan->delete();

        return new LoanResource($loan);
    }
}
