<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function editOrder($id){
        $order=Order::where('id',$id)->where('sender_id',auth()->user()->id)->get()->last();
        if (empty($order)){
            $message='this orders not belong to this user!';
            return view('error.template',compact('message'));
        }
        return view('componants.editOrder',compact('order'));
    }

    public function updateOrder(Request $request){
        $order=Order::where('id',$request->id)->where('sender_id',auth()->user()->id)->get()->last();
        if (empty($order)){
            $message='this orders not belong to this user!';
            return view('error.template',compact('message'));
        }
        $order->update([
            'future_name' => $request->future_name,
            'future_email' => $request->future_email,
            'future_address' => $request->future_address,
            'future_phone' => $request->future_phone,
            'weight' => $request->order_weight,
            'width' => $request->order_width,
            'height' => $request->order_height,
            'thickness' => $request->order_thickness,
            'cost' => $request->order_weight*5,
        ]);
        return redirect()->route('account');
    }
}
