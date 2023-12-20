<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shoppers', function (Blueprint $table) {
            //   $table->string("city");
            //  $table->string("city")->after("phonenumbersss");
            $table->string("city")->after("phonenumber");
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shoppers', function (Blueprint $table) {
            //
        });
    }
};
