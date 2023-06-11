<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyTransferRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function money_trans(MoneyTransferRequest $request){
        return view('componants.test');
    }
}
