<?php

use App\Models\MemberPoint;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->json('product');
            $table->json('quantity');
            $table->float('sub_total')->nullable()->default('00.00');
            $table->float('vat')->nullable()->default('00.00');
            $table->float('grand_total_usd')->nullable()->default('00.00');
            $table->float('grand_total_khr')->nullable()->default('00.00');
            $table->foreignIdFor(MemberPoint::class)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
