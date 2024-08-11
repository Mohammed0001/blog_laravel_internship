<?php

use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title" , 1000);
            $table->string("slug")->unique();
            $table->text("content");
            $table->boolean("is_published")->default(false);
            $table->unsignedBigInteger('post_owner_id');
            $table->timestamps();

            $table->foreign('post_owner_id')->references('id')->on('users')->onDelete('cascade');

            // $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();ss
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
