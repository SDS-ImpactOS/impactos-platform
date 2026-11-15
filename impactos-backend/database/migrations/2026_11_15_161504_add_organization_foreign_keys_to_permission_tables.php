<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->cascadeOnDelete();
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->cascadeOnDelete();
        });

        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
        });
    }
};