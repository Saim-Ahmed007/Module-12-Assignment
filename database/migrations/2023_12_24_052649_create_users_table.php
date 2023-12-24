<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['id'=>'1', 'name'=>'john', 'created_at'=>'2023-02-19 14:05:15', 'updated_at'=>'2023-04-04 19:22:27'],
            ['id'=>'2', 'name'=>'alex', 'created_at'=>'2023-02-19 15:05:15', 'updated_at'=>'2023-04-04 19:22:30'],
            ['id'=>'3', 'name'=>'jack', 'created_at'=>'2023-02-19 16:05:15', 'updated_at'=>'2023-04-04 20:22:27'],
            ['id'=>'4', 'name'=>'peter', 'created_at'=>'2023-02-19 17:05:15', 'updated_at'=>'2023-04-04 19:23:27'],
            ['id'=>'5', 'name'=>'smith', 'created_at'=>'2023-02-19 18:05:15', 'updated_at'=>'2023-04-04 19:22:29'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
