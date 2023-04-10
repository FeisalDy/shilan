<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign('chapters_novel_id_foreign');

            $table->foreign('novel_id')
                ->references('id')
                ->on('novels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->foreign('novel_id')->references('id')->on('novels');
        });
    }
};
