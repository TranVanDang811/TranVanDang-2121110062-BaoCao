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
        Schema::create('tvd_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000)->comment('Tên');
            $table->string('slug',1000);
            $table->string('image');
            $table->unsignedInteger('parent_id')->comment('Cấp cha');
            $table->unsignedInteger('sort_order')->comment('Sắp xếp');
            $table->unsignedInteger('level');
            $table->string('metakey',255)->comment('Từ khóa');
            $table->string('metadesc',255)->comment('Mô tả');
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
        Schema::dropIfExists('tvd_category');
    }
};
