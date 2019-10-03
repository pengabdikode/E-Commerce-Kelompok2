<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Stock;
class ProductController extends Controller
{
    //This function is to add//
        public function addproduct(Request $request){
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_product');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

    		$product= new Product;
    		$product->name=$data['product_name'];
            $product->harga=$data['product_price'];
            $product->id_brand=$data['product_category'];
            $product->id_category=$data['product_brand'];
            $product->foto = $file_name;
    		$product->description=$data['product_description'];
    		$product->save();
    		return redirect("/admin/view-product")->with('flash_message_success','Product Added Successfully');
    	}

    	$levels= Category::get();
        $brands= Brand::get();
    	return view("admin.product.add-product")->with(compact('levels', 'brands'));
    }
    //this function is to show
    public function viewproduct(){
    	$product= Product::get();

    	return view("admin.product.view-product")->with(compact("product"));
    }

    //this function is to edit product//
    public function editproduct(Request $request, $id=null){
    	if($request->isMethod('POST')){

            $data1 = \App\Product::findOrFail($id);
    		$data=$request->all();

            if (empty($request->file('photo_product'))){

                Product::where(['id'=>$id])->update(['name'=>$data['product_name'],'description'=>$data['product_description'], 'foto'=>$data1->foto, 'id_category'=>$data['product_category'], 'id_brand'=>$data['product_brand'], 'harga'=>$data['product_price'],'status'=>$data['status_product']]);
            }
            else{
            unlink('data_file/'.$data1->foto); //menghapus file lama
            
            $file = $request->file('photo_product');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

            Product::where(['id'=>$id])->update(['name'=>$data['product_name'],'description'=>$data['product_description'],'foto'=>$file_name, 'id_category'=>$data['product_category'], 'id_brand'=>$data['product_brand'], 'harga'=>$data['product_price'], 'status'=>$data['status_product']]);
            }

    		return redirect("/admin/view-product")->with('flash_message_success','Edit Product Successfully');
    	}

        $levels= Category::get();
        $brands= Brand::get();
        // $brando= Brand::get();
        // $levelo= Category::get();
    	$productDetails= Product::where(['id'=>$id])->first();
    	return view('admin.product.edit-product')->with(compact('productDetails', 'levels', 'brands'));

    }

    //this function is to delete
    public function deleteproduct(Request $request, $id=null){

        $stock= Stock::where(['id_product'=>$id])->first();
        if(!$stock){
            Product::where(['id'=>$id])->delete();
              return redirect("/admin/view-product")->with('flash_message_success','Delete Product Successfully');
        }else{
            if($stock->id_product == $id){
                return redirect("/admin/view-product")->with('flash_message_error','Stock is still exist');
            }
    	}
    
    }
}
