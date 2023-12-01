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
            $table->foreignIdFor(Product::class);
            $table->integer('quantity');
            $table->float('sub_total');
            $table->float('vat');
            $table->float('grand_total_usd');
            $table->float('grand_total_khr');
            $table->foreignIdFor(MemberPoint::class);
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
