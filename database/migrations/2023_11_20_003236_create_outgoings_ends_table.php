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
        Schema::create('outgoings_ends', function (Blueprint $table) {
            $table->id();
            $table->string('name_pic');
            $table->string('id_pic');
            $table->date('current_date');
            $table->string('site_name');
            $table->text('coment');
            $table->text('qty_item_info');
            $table->text('brcd_item_info_out');
            $table->text('brcd_item_info_in');
            $table->text('brcd_item_info_use');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoings_ends');
    }
};
