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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('action');
            $table->text('description')->nullable();

            $table->integer('acquired_points');
            $table->string('notification_target');
            $table->string('notification_topic');
            $table->string('list_of_connections');
            $table->string('list_of_badges');
            $table->string('recieved_recommendations');
            $table->string('given_recommendations');
            $table->string('bought_tickets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
