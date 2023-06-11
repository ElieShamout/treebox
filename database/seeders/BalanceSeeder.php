<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BalanceSeeder extends Seeder
{
    public $user_id=0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=10;$i++){
            DB::table('balances')->insert([
                'user_id' => $i,
                'balance' => '15000',
            ]);
        }
        // \App\Models\Balance::factory(10)->create();
    }
}
