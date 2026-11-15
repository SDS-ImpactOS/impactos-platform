<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    // Informations sur l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // Vérification du contexte de l'organisation active
    Route::middleware('organization.context')->group(function () {

        Route::get('/organization/context', function (Request $request) {

            $organizationId = $request->header('X-Organization-ID');

            $organization = $request->user()
                ->organizations()
                ->where('organizations.id', $organizationId)
                ->first();

            return response()->json([
                'organization' => $organization,
                'user_id' => $request->user()->id,
            ]);
        });

    });

});