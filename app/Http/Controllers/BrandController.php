<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
class BrandController extends Controller
{
     public function addbrand(Request $request){
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;

              // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('logo_brand');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

    		$brand= new Brand;
    		$brand->name=$data['brand_name'];
    		$brand->description=$data['brand_description'];
            $brand->logo=$file_name;
    		$brand->url=$data['url'];
    		$brand->save();
    		return redirect("/admin/view-brand")->with('flash_message_success','Brand Added Successfully');
    	}

    	return view("admin.brand.add-brand");
    }

    public function viewbrand(){
    	$brand= Brand::get();

    	return view("admin.brand.view-brand")->with(compact("brand"));
    }

    public function editbrand(Request $request, $id=null){
    	if($request->isMethod('POST')){
            $data1 = \App\Brand::findOrFail($id);
    		$data=$request->all();

            if (empty($request->file('logo_brand'))){

                Brand::where(['id'=>$id])->update(['name'=>$data['brand_name'],'description'=>$data['brand_description'],'logo'=>$data1->logo,'url'=>$data['url']]);

            }else{

            unlink('data_file/'.$data1->logo); //menghapus file lama
            
            $file = $request->file('logo_brand');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

    		// echo "<pre>";print_r($data); die;
    		Brand::where(['id'=>$id])->update(['name'=>$data['brand_name'],'description'=>$data['brand_description'],'logo'=>$file_name,'url'=>$data['url']]);

            }

    		return redirect("/admin/view-brand")->with('flash_message_success','Edit Brand Successfully');

    	}

    	$brandDetails= Brand::where(['id'=>$id])->first();
    	return view('admin.brand.edit-brand')->with(compact('brandDetails'));

    }

    public function deletebrand(Request $request, $id=null){
         $product= Product::where(['id_brand'=>$id])->first();
        if(!$product){
            Brand::where(['id'=>$id])->delete();
              return redirect("/admin/view-brand")->with('flash_message_success','Delete Category Successfully');
        }else{
            if($product->id_category == $id){
                return redirect("/admin/view-brand")->with('flash_message_error','Product with this brand is still exist');
            }
        }
    }
}
