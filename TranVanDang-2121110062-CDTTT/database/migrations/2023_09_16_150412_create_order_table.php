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
        Schema::create('tvd_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('phone',255);
            $table->string('address',255);
            $table->string('note',255);
            $table->unsignedInteger('created_by')->default(1)->comment('Người tạo');
            $table->unsignedInteger('updated_by')->nullable()->comment('Người sửa');
            $table->timestamps();
            $table->tinyInteger('status')->default(2)->comment('trạng thái');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tvd_order');
    }
};
