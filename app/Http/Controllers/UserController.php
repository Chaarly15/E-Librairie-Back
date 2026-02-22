<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Méthode Login

    public function login(Request $request)
    {
        // Validation des données d'authentification

        $request->validate(
            [
                'email' => ['required_without:phone', 'string', 'max:30'],
                'phone' => ['required_without:email', 'string', 'max:14'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        // Requette de connexion

        // Vérification des identifiants
        $user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Les informations saisie sont incorrectes', 'status' => 404, 'succes' => false], 404);
        }

        // Création du token de connexion
        $token = $user->createToken('MyAppToken')->plainTextToken;

        $user->token = $token;

        return new UserResource($user);

    }

    // Méthode register
    public function register(Request $request)
    {
        // Validation des données d'enregistrement
        $request->validate(
            [
                'user_name' => ['required', 'string', 'unique:users,user_name', 'max:15'],
                'full_name' => ['required', 'string', 'max:60'],
                'phone' => ['required', 'string', 'unique:users,phone', 'max:14'],
                'email' => ['required',  'email', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );
        // dd($request->toArray());

        // Requête de création d'un utilisateur
        $user = User::create($request->toArray());

        // Création de token
        $token = $user->createToken('MyAppToken')->plainTextToken;

        $user->token = $token;

        // Redirection
        return new UserResource($user);

    }

    // Méthode de mise à jours des informations
    public function update(Request $request, User $user)
    {

        // Fonction de validation des données
        $request->validate(
            [
                'user_name' => ['required', 'string', 'max:15'],
                'full_name' => ['required', 'string', 'max:60'],
                'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore($user->id), 'max:14'],
                'email' => ['required',  'email', Rule::unique('users', 'email')->ignore($user->id)],
            ]
        );

        // Requête de mise à jour
        $user->update($request->toArray());

        return new UserResource($user->refresh());

    }

    // Méthode logout
    public function logout(Request $request)
    {

        // Récupérer l'utilisateur connecté
        $currentUser = $request->user();

        // dd($currentUser);

        // Suppression du token de lutilisateur courrant
        $currentUser->currentAccessToken()->delete();

        return new UserResource($currentUser->refresh());
    }

    // Méthode delete
    public function delete(User $user)
    {

        $user->delete();

        return new UserResource($user);
    }
}
