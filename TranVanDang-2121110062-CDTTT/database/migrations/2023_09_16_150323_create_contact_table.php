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
        Schema::create('tvd_contact', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name',1000);
            $table->string('email',1000)->unique();
            $table->string('phone',1000);
            $table->string('title',1000);
            $table->mediumText('content');
            $table->unsignedInteger('replay_id');
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
        Schema::dropIfExists('tvd_contact');
    }
};
