<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Remittance;

class AccountController extends Controller
{
    public function account(){
        // get user account
        $user=auth()->user();

        // balance
        $balance=auth()->user()->balance->balance;

        // get Orders
        $outGoingOrders=auth()->user()->outGoingOrders ?? ['data'=>'false'];
        $inComingOrders=Order::with(['sender'=>function($q){
            $q->select('id','fname','lname','email','phone','address');
        }])->where('future_email',$user->email)->get();

        $outGoingOrdersCount=count($outGoingOrders);
        $inComingOrdersCount=count($inComingOrders);

        // get Trans
        $outGoingMoney=Remittance::with(['future'=>function($q){
            $q->select('id','fname','lname','email','phone','address');
        }])->where('sender_id',$user->id)->get();

        $inComingMoney=Remittance::with(['sender'=>function($q){
            $q->select('id','fname','lname','email','phone','address');
        }])->where('future_id',$user->id)->get();

        $outGoingRemittancesCount=count($outGoingMoney);
        $inComingRemittancesCount=count($inComingMoney);

        $outgoingRemittancesCost=0;
        $incomingRemittancesCost=0;

        return view('componants.account')->with('user',$user)
                                         ->with('outGoingOrders',$outGoingOrders)
                                         ->with('inComingOrders',$inComingOrders)
                                         ->with('inComingOrders1',$inComingOrders)
                                         ->with('outGoingMoney',$outGoingMoney)
                                         ->with('inComingMoney',$inComingMoney)
                                         ->with('outgoingRemittancesCost',$outgoingRemittancesCost)
                                         ->with('incomingRemittancesCost',$incomingRemittancesCost)
                                         ->with('outGoingOrdersCount',$outGoingOrdersCount)
                                         ->with('inComingOrdersCount',$inComingOrdersCount)
                                         ->with('outGoingRemittancesCount',$outGoingRemittancesCount)
                                         ->with('inComingRemittancesCount',$inComingRemittancesCount)
                                         ->with('balance',$balance);
    }
}
