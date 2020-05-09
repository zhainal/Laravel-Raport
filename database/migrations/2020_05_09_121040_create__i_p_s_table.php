<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IPS', function (Blueprint $table) {
            $table->id();
            $table->string("nis")->unique();
            $table->double("nilai_pengetahuan");
            $table->text("deskripsi_pengetahuan");
            $table->double("nilai_keterampilan");
            $table->text("deskripsi_keterampilan");

            $table->foreign("nis")->references("nis")->on("students")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_i_p_s');
    }
}
