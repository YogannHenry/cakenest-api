<?php

namespace App\Http\Controllers;

use App\Models\CupCake;
use App\Http\Resources\CupCakeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CupCakeController extends Controller
{
    public function index()
    {
        $cupCakes = CupCake::all();
        return CupCakeResource::collection($cupCakes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'is_advertised' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cupCake = CupCake::create($validator->validated());
        return CupCakeResource::make($cupCake);
    }

    public function update(Request $request, $id)
    {
        // Validation des données entrantes
        $validator = Validator::make($request->all(), [
            'image' => 'string',
            'name' => 'string',
            'price' => 'numeric|min:0',
            'quantity' => 'integer|min:0',
            'is_available' => 'boolean',
            'is_advertised' => 'boolean',
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Recherche du cupcake à mettre à jour
        $cupCake = CupCake::find($id);

        // Vérifier si le cupcake existe
        if (!$cupCake) {
            return response()->json(['error' => 'CupCake not found'], 404);
        }

        // Mettre à jour les attributs du cupcake
        $cupCake->update($validator->validated());
        return CupCakeResource::make($cupCake);
    }

    public function destroy($id)
    {
        // Recherche du cupcake à supprimer
        $cupCake = CupCake::find($id);

        // Vérifier si le cupcake existe
        if (!$cupCake) {
            return response()->json(['error' => 'CupCake not found'], 404);
        }

        // Supprimer le cupcake
        $cupCake->delete();
        return response()->json('deleted');
    }
}
