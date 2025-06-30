<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso3', 3)->nullable();
            $table->string('iso2', 2)->nullable();
            $table->string('numeric_code', 3)->nullable();
            $table->string('phonecode')->nullable();
            $table->string('capital')->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('tld')->nullable();
            $table->string('native')->nullable();
            $table->string('region')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('subregion')->nullable();
            $table->integer('subregion_id')->nullable();
            $table->string('nationality')->nullable();
            $table->json('timezones')->nullable();
            $table->json('translations')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('emoji', 10)->nullable();
            $table->string('emojiU')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};