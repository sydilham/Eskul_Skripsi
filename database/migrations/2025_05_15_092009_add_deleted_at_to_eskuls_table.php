<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('eskuls', function (Blueprint $table) {
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
    }

    public function down()
    {
        Schema::table('eskuls', function (Blueprint $table) {
            $table->dropColumn('deleted_at');  // This will drop the 'deleted_at' column if the migration is rolled back
        });
    }
};
