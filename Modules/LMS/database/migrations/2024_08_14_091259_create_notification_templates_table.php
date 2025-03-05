<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'notification_templates',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->string('template_name');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_templates');
    }
};
