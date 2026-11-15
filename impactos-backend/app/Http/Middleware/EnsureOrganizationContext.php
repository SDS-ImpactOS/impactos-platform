<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;
use Symfony\Component\HttpFoundation\Response;

class EnsureOrganizationContext
{
    public function handle(Request $request, Closure $next): Response
    {
        $organizationId = $request->header('X-Organization-ID');
        $user = $request->user();

        if (!$user || !$organizationId || !Str::isUuid($organizationId)) {
            return response()->json([
                'message' => 'Contexte organisationnel invalide.',
            ], 400);
        }

        $isMember = $user->organizations()
            ->where('organizations.id', $organizationId)
            ->where('organizations.status', 'active')
            ->wherePivot('status', 'active')
            ->exists();

        if (!$isMember) {
            return response()->json([
                'message' => 'Organisation introuvable ou accès non autorisé.',
            ], 404);
        }

        $permissionRegistrar = app(PermissionRegistrar::class);

        $permissionRegistrar->setPermissionsTeamId($organizationId);

        $user->unsetRelation('roles');
        $user->unsetRelation('permissions');

        try {
            return $next($request);
        } finally {
            $permissionRegistrar->setPermissionsTeamId(null);

            $user->unsetRelation('roles');
            $user->unsetRelation('permissions');
        }
    }
}
