<?php

use App\Enums\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stanowisko', function (Blueprint $table) {
            $table->id();
            $table->string('stanowisko');
            $table->boolean('chemia')->default(0);
            $table->boolean('halas')->default(0);
            $table->boolean('inne')->default(0);
            $table->enum('poziom_dostepu',UserRole::TYPES)->default(UserRole::WRKR);
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
        Schema::dropIfExists('stanowisko');
    }
};
