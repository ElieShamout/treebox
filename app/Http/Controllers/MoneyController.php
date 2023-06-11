<?php

namespace App\Http\Controllers;

use App\Models\Remittance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;

class MoneyController extends Controller
{
    public function editTransMoney($id){
        $trans=Remittance::where('id',$id)->where('sender_id',auth()->user()->id)->get()->last();

        if (empty($trans)){
            $message='this transiction not belong into this user';
            return view('error.template',compact('message'));
        }

        $future_email=User::select('email')->where('id',$trans->future_id)->get();
        
        $trans['future_email']=$future_email[0]->email;

        return view('componants.editTrans',compact('trans'));
    }

    public function updateTransMoney(Request $request){
        $trans=Remittance::where('id',$request->id)->where('sender_id',auth()->user()->id)->get()->last();

        if (empty($trans)){
            $message='this transiction not belong into this user';
            return view('error.template',compact('message'));
        }
        $future_id=User::select('id')->where('email',$request->future_email_trans)->get()->last()->id ?? null;

        if ($future_id==null){
            $message='this email dosn\'t found in out database.';
            return view('error.template',compact('message'));
        }

        $trans->update([
            'future_id' => $future_id,
            'amount' => $request->amount_transfer,
            'cost' => ($request->amount_transfer>1000) ? ($request->amount_transfer/100) : (($request->amount_transfer/100)*2)
        ]);
        
        return redirect()->route('account');
    }
}
