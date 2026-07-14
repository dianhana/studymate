<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('username')->unique()->after('name');

            $table->string('university')->nullable();

            $table->string('major')->nullable();

            $table->string('semester')->nullable();

            $table->text('bio')->nullable();

            $table->string('photo')->default('default.png');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'username',
                'university',
                'major',
                'semester',
                'bio',
                'photo'
            ]);

        });
    }
};