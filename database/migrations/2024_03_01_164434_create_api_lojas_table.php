<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::dropIfExists('api_lojas');
        Schema::dropIfExists('products');

        if(!Schema::hasTable('api_lojas')){
            Schema::create('api_lojas', function (Blueprint $table) {
                $table->bigIncrements('sales_id')->start_from('0000001');//Auto incrementable 
                $table->integer('amount');
                $table->string('products');
                $table->integer('status')->default(1); //Default status 1 (sales is not cancelled)
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('products')){
            Schema::create('products', function (Blueprint $table) {
                $table->integer('product_id');//Auto incrementable 
                $table->string('name');
                $table->float('price');
                $table->string('description'); //Default status 1 (sales is not cancelled)
                $table->timestamps();
            });
        }
        DB::table('products')->insert(
            [
                'product_id' => 1,
                'name' => 'Celular 1',
                'price' => 1.800,
                'description' => 'Lorenzo Ipsulum',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('products')->insert(
            [
                'product_id' => 2,
                'name' => 'Celular 2',
                'price' => 3.200,
                'description' => 'Lorem ipsum dolor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('products')->insert(
            [
                'product_id' => 3,
                'name' => 'Celular 3',
                'price' => 9.800,
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }

    
    public function down(): void
    {
        Schema::dropIfExists('api_lojas');
        Schema::dropIfExists('products');
    }
};
