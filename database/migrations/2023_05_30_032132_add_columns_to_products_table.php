<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2);
            $table->string('payment_id')->nullable();
            $table->date('today_date')->nullable();
            $table->date('final_date')->nullable();
            $table->date('reservation_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('payment_id');
            $table->dropColumn('today_date');
            $table->dropColumn('final_date');
            $table->dropColumn('reservation_date');
        });
    }
}
