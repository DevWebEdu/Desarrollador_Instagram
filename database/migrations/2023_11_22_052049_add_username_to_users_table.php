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
        Schema::table('users', function (Blueprint $table) {
            /* Agregamos el campo username a la tabla de users con la migracion nomenclaturada add_username_to_users_table */
            $table->string('username')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            /* En caso de un rollback de esta migracion se realiza el drop del campo añadido  */
            $table->dropColumn('username');
        });
    }
};
