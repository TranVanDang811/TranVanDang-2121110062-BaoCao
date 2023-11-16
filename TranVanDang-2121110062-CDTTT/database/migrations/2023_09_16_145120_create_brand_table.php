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
        Schema::create('tvd_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên');
            $table->string('slug',1000)->comment('Slug');
            $table->string('image',255)->nullable()->comment('Hình ảnh');
            $table->unsignedInteger('sort_order')->default(0)->comment('Vị trí hiển thị');
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
        Schema::dropIfExists('tvd_brand');
    }
};
