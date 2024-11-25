<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dish_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');
            $table->unsignedTinyInteger('rating'); // Calificación de 1 a 5
            $table->text('review')->nullable(); // Comentario opcional
            $table->timestamps();
        
            // Prevenir calificaciones duplicadas por el mismo usuario
            $table->unique(['user_id', 'dish_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dish_ratings');
    }
};
