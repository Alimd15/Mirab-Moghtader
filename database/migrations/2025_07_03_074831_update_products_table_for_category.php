<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('brand');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->dropColumn('category');
        });
    }
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category', 100)->after('brand');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
