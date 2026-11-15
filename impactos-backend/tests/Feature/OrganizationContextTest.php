<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class OrganizationContextTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        app(PermissionRegistrar::class)
            ->setPermissionsTeamId(null);
    }

    public function test_unauthenticated_user_cannot_access_organization_context(): void
    {
        $response = $this->getJson('/api/organization/context');

        $response->assertUnauthorized();
    }

    public function test_authenticated_member_can_access_active_organization(): void
    {
        $user = User::factory()->create();

        $organization = Organization::create([
            'name' => 'Organisation Test',
            'slug' => 'organisation-test',
            'status' => 'active',
        ]);

        $user->organizations()->attach($organization->id, [
            'status' => 'active',
            'joined_at' => now(),
        ]);

        $response = $this->actingAs($user)
            ->getJson('/api/organization/context', [
                'X-Organization-ID' => $organization->id,
            ]);

        $response
            ->assertOk()
            ->assertJsonPath('organization.id', $organization->id)
            ->assertJsonPath('user_id', $user->id);

        $this->assertNull(
            app(PermissionRegistrar::class)->getPermissionsTeamId()
        );
    }

    public function test_user_cannot_access_suspended_organization_membership(): void
    {
        $user = User::factory()->create();

        $organization = Organization::create([
            'name' => 'Organisation Suspendue',
            'slug' => 'organisation-suspendue',
            'status' => 'active',
        ]);

        $user->organizations()->attach($organization->id, [
            'status' => 'suspended',
            'joined_at' => now(),
        ]);

        $this->actingAs($user)
            ->getJson('/api/organization/context', [
                'X-Organization-ID' => $organization->id,
            ])
            ->assertNotFound();
    }

    public function test_user_cannot_access_another_organization(): void
    {
        $user = User::factory()->create();

        $organizationA = Organization::create([
            'name' => 'Organisation A',
            'slug' => 'organisation-a',
            'status' => 'active',
        ]);

        $organizationB = Organization::create([
            'name' => 'Organisation B',
            'slug' => 'organisation-b',
            'status' => 'active',
        ]);

        $user->organizations()->attach($organizationA->id, [
            'status' => 'active',
            'joined_at' => now(),
        ]);

        $this->actingAs($user)
            ->getJson('/api/organization/context', [
                'X-Organization-ID' => $organizationB->id,
            ])
            ->assertNotFound();
    }

    public function test_invalid_organization_uuid_is_rejected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->getJson('/api/organization/context', [
                'X-Organization-ID' => 'invalid-uuid',
            ])
            ->assertStatus(400);
    }

    public function test_missing_organization_header_is_rejected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->getJson('/api/organization/context')
            ->assertStatus(400);
    }

    public function test_user_cannot_access_a_suspended_organization(): void
    {
        $user = User::factory()->create();

        $organization = Organization::create([
            'name' => 'Organisation Suspendue',
            'slug' => 'organisation-suspendue-2',
            'status' => 'suspended',
        ]);

        $user->organizations()->attach($organization->id, [
            'status' => 'active',
            'joined_at' => now(),
        ]);

        $this->actingAs($user)
            ->getJson('/api/organization/context', [
                'X-Organization-ID' => $organization->id,
            ])
            ->assertNotFound();
    }
}