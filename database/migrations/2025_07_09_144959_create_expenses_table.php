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
        // migration: database/migrations/xxxx_xx_xx_xxxxxx_create_expenses_table.php

        /*
 جدول هزینه‌ها برای ذخیره هزینه‌های جانبی فروشگاه
*/
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // عنوان هزینه مثل کرایه
            $table->decimal('amount', 12, 2); // مبلغ هزینه
            $table->date('expense_date');    // تاریخ هزینه
            $table->text('description')->nullable(); // توضیحات اختیاری
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
