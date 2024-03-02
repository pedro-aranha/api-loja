<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('api_lojas', function (Blueprint $table) {
            $table->bigIncrements('sales_id')->start_from('0000001');//Auto incrementable 
            $table->integer('amount');
            $table->string('products');
            $table->integer('status')->default(1); //Default status 1 (sales is not cancelled)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_lojas');
    }
};
