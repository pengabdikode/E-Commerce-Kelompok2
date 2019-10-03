<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;

class StockController extends Controller
{
    //
      //
    public function addstock(Request $request){
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;
    		$stock= new Stock;
    		$stock->size=$data['size'];
    		$stock->amount=$data['amount'];
    		$stock->id_product=$data['product_id'];
    		$stock->save();
    		return redirect("/admin/view-stock")->with('flash_message_success','Stock Added Successfully');
    	}

    	$product= Product::get();
    	return view("admin.stock.add-stock")->with(compact('product'));
    }

    public function viewstock(){
    	$stock= Stock::get();
        //return $category;
    	return view("admin.stock.view-stock")->with(compact("stock"));
    }

    public function editstock(Request $request, $id){
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;
    		Stock::where(['id'=>$id])->update(['size'=>$data['size'],'amount'=>$data['amount']]);
    		// $category= new Category;
    		// $category->name=$data['category_name'];
    		// $category->description=$data['category_description'];
    		// $category->url=$data['url'];
    		// $category->save();

    		return redirect("/admin/view-stock")->with('flash_message_success','Edit Stock Successfully');
    	}
    	$product= Product::get();
    	$stock= Stock::where(['id'=>$id])->first();
    	return view('admin.stock.edit-stock')->with(compact('stock', 'product'));

    }

    public function deletestock(Request $request, $id=null){
    	if(!empty($id)){
    		Stock::where(['id'=>$id])->delete();
    		return redirect("/admin/view-stock")->with('flash_message_success','Delete Stock Successfully');
    	}
    }
}
