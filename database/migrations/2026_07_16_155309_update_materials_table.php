<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {

            $table->text('description')->nullable()->after('title');

            $table->string('file_size')->nullable()->after('file');

            $table->string('file_type')->nullable()->after('file_size');

            $table->boolean('is_premium')->default(false)->after('file_type');

            $table->integer('downloads')->default(0)->after('is_premium');

        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {

            $table->dropColumn([
                'description',
                'file_size',
                'file_type',
                'is_premium',
                'downloads'
            ]);

        });
    }
};