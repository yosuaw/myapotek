<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicine_transaction')->insert([
            'medicine_id' => 1,
            'transaction_id' => 1,
            'quantity' => 3,
            'subtotal' => 60000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 11,
            'transaction_id' => 1,
            'quantity' => 2,
            'subtotal' => 35000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 16,
            'transaction_id' => 1,
            'quantity' => 2,
            'subtotal' => 24500
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 8,
            'transaction_id' => 2,
            'quantity' => 2,
            'subtotal' => 30000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 10,
            'transaction_id' => 2,
            'quantity' => 2,
            'subtotal' => 50000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 7,
            'transaction_id' => 3,
            'quantity' => 8,
            'subtotal' => 76000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 4,
            'transaction_id' => 4,
            'quantity' => 8,
            'subtotal' => 80000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 3,
            'transaction_id' => 5,
            'quantity' => 2,
            'subtotal' => 34000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 6,
            'transaction_id' => 5,
            'quantity' => 3,
            'subtotal' => 24000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 7,
            'transaction_id' => 6,
            'quantity' => 1,
            'subtotal' => 9500
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 4,
            'transaction_id' => 7,
            'quantity' => 4,
            'subtotal' => 40000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 9,
            'transaction_id' => 7,
            'quantity' => 6,
            'subtotal' => 132000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 7,
            'transaction_id' => 8,
            'quantity' => 5,
            'subtotal' => 47500
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 12,
            'transaction_id' => 8,
            'quantity' => 7,
            'subtotal' => 122500
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 16,
            'transaction_id' => 8,
            'quantity' => 4,
            'subtotal' => 49000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 2,
            'transaction_id' => 8,
            'quantity' => 5,
            'subtotal' => 75000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 3,
            'transaction_id' => 9,
            'quantity' => 3,
            'subtotal' => 51000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 6,
            'transaction_id' => 9,
            'quantity' => 4,
            'subtotal' => 32000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 12,
            'transaction_id' => 9,
            'quantity' => 5,
            'subtotal' => 87500
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 1,
            'transaction_id' => 10,
            'quantity' => 2,
            'subtotal' => 40000
        ]);

        DB::table('medicine_transaction')->insert([
            'medicine_id' => 10,
            'transaction_id' => 10,
            'quantity' => 4,
            'subtotal' => 100000
        ]);
    }
}
