<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    //
    public function addcategory(Request $request){
    	if($request->isMethod('POST')){
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;

              // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('category_photo');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

    		$category= new Category;
    		$category->name=$data['category_name'];
    		$category->description=$data['category_description'];
            $category->photo=$file_name;
    		$category->url=$data['url'];
    		$category->save();
    		return redirect("/admin/view-category")->with('flash_message_success','Category Added Successfully');
    	}

    	return view("admin.category.add-category");
    }

    public function viewcategory(){
    	$category= Category::get();
        //return $category;
    	return view("admin.category.view-category")->with(compact('category'));
    }

    public function editcategory(Request $request, $id=null){
    	if($request->isMethod('POST')){
            $data1 = \App\Category::findOrFail($id);
    		$data=$request->all();
    		// echo "<pre>";print_r($data); die;

            if (empty($request->file('category_photo'))){

                Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['category_description'],'photo'=>$data1->photo,'url'=>$data['url']]);
            }else{

            unlink('data_file/'.$data1->photo); //menghapus file lama
            
            $file = $request->file('category_photo');
 
            $file_name = time()."_".$file->getClientOriginalName();
 
            $upload_destiny = 'data_file';
            $file->move($upload_destiny,$file_name);

                Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['category_description'],'photo'=>$file_name, 'url'=>$data['url']]);
            }
    		
    		// $category= new Category;
    		// $category->name=$data['category_name'];
    		// $category->description=$data['category_description'];
    		// $category->url=$data['url'];
    		// $category->save();

    		return redirect("/admin/view-category")->with('flash_message_success','Edit Category Successfully');
    	}

    	$categoryDetails= Category::where(['id'=>$id])->first();
    	return view('admin.category.edit-category')->with(compact('categoryDetails'));

    }

    public function deletecategory(Request $request, $id=null){

        $product= Product::where(['id_category'=>$id])->first();
        if(!$product){
            Category::where(['id'=>$id])->delete();
              return redirect("/admin/view-category")->with('flash_message_success','Delete Category Successfully');
        }else{
            if($product->id_category == $id){
                return redirect("/admin/view-category")->with('flash_message_error','Product with this catgory is still exist');
            }
        }
    }
}
