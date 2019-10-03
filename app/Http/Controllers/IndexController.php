<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Bank;
use App\Product;
use App\Category;
use App\Brand;
use App\Stock;
class IndexController extends Controller
{

    //index//
     public function index(){
        $carts=Cart::getContent();
        $total = Cart::getTotal();
    	$category= Category::get();
        $brands= Brand::get();
        $pro=Product::where(['status'=>1])->paginate(6);
    	return view("front.index")->with(compact('category', 'brands', 'pro', 'carts', 'total'));
    }

     //index//
     public function register(Request $request){
        if($request->isMethod('POST')){

            $pro=Product::where(['status'=>1])->paginate(6);
            return redirect('/e-shop/login');
        }else{

            $carts=Cart::getContent();
            $total = Cart::getTotal();
            $category= Category::get();
            $brands= Brand::get();
            return view("front.register_user")->with(compact('category', 'brands', 'carts', 'total'));

        }
        
    }


    //checkout//
     public function checkout(){
        $carts=Cart::getContent();
        $total = Cart::getTotal();
        $bank= Bank::get();
        $category= Category::get();
        $size= Stock::get();
        $brands= Brand::get();
        return view("front.checkout")->with(compact('category', 'brands','carts', 'total', 'size', 'bank'));
    }

    /////all cart function//////
    //cart//
        public function cart(){
        $carts=Cart::getContent();
        $size=Stock::get();
        // return $carts;    
        $category= Category::get();
        $brands= Brand::get();
        return view("front.cart")->with(compact('category', 'brands', 'carts','size', 'total'));
    }

    //add-cart//
       public function addcart(Request $request, $id){

        $data=$request->all();
        $product = Product::find($id);
        $stock=Stock::where(['id'=>$data['id_size']])->first();
     

            Cart::add($product->id, $product->name, $product->harga, 1, array(                
                'photo'=>$product->foto, 
                'id_size'=>$data['id_size']
            )

            );
 
                return redirect("/detail/".$id)->with('flash_message_success', 'Product added to cart successfully!');     
        
      
    }

    public function updateCart(Request $request, $id, $size)
    {
        $data=$request->all();
        $stock=Stock::where(['id'=>$size])->first();

            if($stock->amount < $data['amount']){
            
                return redirect("/cart")->with('flash_message_error', 'Stock only available around '.$stock->amount);

            }else{
                Cart::update($id, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $data['amount']
                    ],
                ]);

                return redirect("/cart")->with('flash_message_success', 'Updated successfully');
            }
        
    }
    
    public function removeCart($id)
    {
        Cart::remove($id);

            return redirect()->back()->with('flash_message_success', 'Product deleted from cart successfully!');
        
    }



    ///////all product ///////
    //product//
     public function product(){
        $carts=Cart::getContent();
        $total = Cart::getTotal();
        $category= Category::get();
        $brands= Brand::get();
        $pro=Product::where(['status'=>1])->paginate(6);
        return view("front.products")->with(compact('category', 'brands', 'pro', 'carts', 'total'));
    }

    //view-by product//
     public function viewby_product($view, $id){
        $carts=Cart::getContent();
        $total = Cart::getTotal();
        $category= Category::get();
        $brands= Brand::get();
        if($view==1){
            $show= Category::where(['id'=>$id])->first();
            $status=Product::where(['id_category'=>$id]);
            $products=$status->where('status',1)->paginate(4);
        }else if($view==2){
            $show= Brand::where(['id'=>$id])->first();
            $status=Product::where(['id_brand'=>$id]);
            $products=$status->where('status',1)->paginate(4); 
        }
        return view("front.viewby_product")->with(compact('category','products','show', 'brands', 'carts', 'total'));
    }

    //detail//
     public function detail(Request $request, $id=null){
        $carts=Cart::getContent();
        $total = Cart::getTotal();
        $category= Category::get();
        $brands= Brand::get();
        $productDetails= Product::where(['id'=>$id])->first();
        $size= Stock::where(['id_product'=>$id])->get();
        return view("front.detail_product")->with(compact('category', 'brands', 'productDetails', 'size', 'carts', 'total'));
        
    }

}
