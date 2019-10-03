<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\Bank;
use App\Transaction;


class Monetary_Controller extends Controller
{
	/////////////Transaction function/////////////////
    public function viewtransaction(){
    	$transaction= Transaction::get();

    	return view("admin.monetary.transaction_view")->with(compact("transaction"));
    }

    public function edittransaction($id){
    		// echo "<pre>";print_r($data); die;
    		Transaction::where(['id'=>$id])->update(['status'=>'Paid Off']);

    		return redirect("/admin/monetary-viewTransaction")->with('flash_message_success','Edit Transaction Status Successfully');

    }

    /////////////Bank function/////////////////
    public function viewbank(){
    	$bank= Bank::get();

    	return view("admin.monetary.bank_view")->with(compact("bank"));
    }

     public function addbank(Request $request){
     	if($request->isMethod('POST')){
     	$data=$request->all();
     	$bank= new Bank;
    		$bank->name=$data['bank_name'];
    		$bank->code=$data['bank_code'];
    		$bank->save();

    	return redirect("/admin/monetary-viewBank")->with('flash_message_success','Bank Added Successfully');
    	}

    return view("admin.monetary.add_bank");
    }

    public function editbank(Request $request, $id){

    		// echo "<pre>";print_r($data); die;
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		Bank::where(['id'=>$id])->update(['name'=>$data['bank_name'],'code'=>$data['bank_code']]);

    		return redirect("/admin/monetary-viewBank")->with('flash_message_success','Edit Bank Successfully');
    	}

    	$bank= Bank::where(['id'=>$id])->first();
    	return view('admin.monetary.edit_bank')->with(compact('bank'));

    }

    public function deletebank($id){
    		// echo "<pre>";print_r($data); die;
    		Bank::where(['id'=>$id])->delete();

    		return redirect("/admin/monetary-viewBank")->with('flash_message_success','Delete Bank Successfully');

    }

     /////////////Income function/////////////////
     public function viewincome(){
    	$income= Income::get();

    	return view("admin.monetary.income_view")->with(compact("income"));
    }
}
