<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Carbon\Carbon;


class UserController extends Controller
{

    function index(){
        $details = DB::select('select product_id,name,catchphrase,picture,price,category from products');
        return view('index',['products'=>$details]);
    }
    function cart(){
        $id = Session('LoggedUser');
        if($id== null){
            return view('auth.signin');
        }
        else{
        $items = DB::select('select product_id,picture,name,price,catchphrase FROM cart NATURAL JOIN products WHERE user_id=?',[$id]);
        return view('cart',['items'=>$items]);
        }
    }
    function products(){
        $category = request('category');
        if(!isset($category)){
            $details = DB::select('select product_id,name,catchphrase,picture,price,category from products');
        }
        else{
            $details = DB::select('select product_id,name,catchphrase,picture,price,category from products where category=?',[$category]);
        }
        return view('products',['products'=>$details]);
    }

    function checkout(){
        //get current userid
        $id = Session('LoggedUser');
        $items = DB::select('select product_id,picture,name,price,quantity FROM cart NATURAL JOIN products WHERE user_id=?',[$id]);
        return view('checkout',['items'=>$items]);
    }
    function receipt(){
        //user id
        $id = Session('LoggedUser');
        $order_id = request('id');
        $items = DB::select('select * FROM orders NATURAL JOIN products WHERE user_id=? and order_id=?',[$id,$order_id]);
        return view('receipt',['items'=>$items]);
    }
    function orderStatus(){
        $order_id = request('id');
        $date = request('date');
        $day = Carbon::createFromFormat('Y-m-d', $date)->format('d');
        $month = Carbon::createFromFormat('Y-m-d', $date)->format('F');
        return view('order-status',["order_id"=>$order_id,"day"=>$day,"month"=>$month]);
    }

    function product(){
        $id = request('id');
        $details = DB::select('select * from products where product_id=?',[$id]);
        $reviews = DB::select('select review,user_rating,username,profile_picture,user_id from (reviews natural join admins), products WHERE reviews.product_id = products.product_id and products.product_id=?',[$id]);

        //get user id
        $userid = Session('LoggedUser');
        $isReviewed = false;
        foreach( $reviews as $review){
            if($review->user_id == $userid)
                $isReviewed = true;
        }
        return view('product',['details' => $details[0],'reviews'=>$reviews,'isReviewed'=>$isReviewed]);
    }

    function addtocart($id){
        //  get $userid
        $userid = Session('LoggedUser');
        if($userid== null){
            return view('auth.signin');
        }
        else{
        DB::insert('insert into cart(user_id, product_id, quantity) VALUES (?,?,1)',[$userid,$id]);
        return redirect('cart');
        }
    }
    
    function remove($id){
        //get  id
        $id = Session('LoggedUser');
        DB::delete('delete FROM cart WHERE user_id=1 and product_id=?',[$id]);
        return redirect('cart');
    }

    function addreview($id){
        //get currrent user
        $userid = Session('LoggedUser');
        $review = $_POST['review'];
        $rating = $_POST['rating'];
        DB::insert('insert into reviews(user_id, product_id, review,user_rating) VALUES (?,?,?,?)',[$userid,$id,$review,$rating]);
        return redirect("product?id={$id}");
    }

    function search(){
        $searchterm = request('search');
        $category = request('category');
        
        if(strlen($searchterm)>0){
            if(!isset($category))
                $searchresults = DB::select(DB::raw("select * from products where name like '$searchterm%'"));
            else
                $searchresults = DB::select(DB::raw("select * from products where category='$category' and name like '$searchterm%'"));
            return response($searchresults);
        }
        
    }
    function results(){
        $searchterm = $_POST['search'];
        $category = $_REQUEST['category'];
        if(strlen($searchterm)>0){
            if(strcmp($category,""))
                $searchresults = DB::select(DB::raw("select * from products where name like '$searchterm%'"));
            else
                $searchresults = DB::select(DB::raw("select * from products where category='$category' and name like '$searchterm%'"));  
            return view('products',['products'=>$searchresults]);
        }
        return redirect('/');
    }

    function updatecart(){
        //get user
        $id = Session('LoggedUser');
        $items = DB::select('select product_id,quantity FROM cart NATURAL JOIN products WHERE user_id=?',[$id]);        
        $quantity = request('quantity');
        for ( $i = 0 ; $i < sizeof($items); $i++ ){
            if($quantity[$i] != $items[$i]->quantity){
                DB::update('update cart set quantity=? where product_id=? and user_id=?',[$quantity[$i],$items[$i]->product_id,$id]);
            }
        }
        return redirect('checkout');
    }

    function makeorder(){
        //get user
        $id = Session('LoggedUser');
        $address = request('address');
        $payment = request('pay');
        $items = DB::select('select product_id,quantity FROM cart NATURAL JOIN products WHERE user_id=?',[$id]);
        $order_id = DB::select('select max(order_id) as order_id from orders');
        $max_id = $order_id[0]->order_id+1;
        $date = date('Y-m-d');
        foreach( $items as $item){
            DB::insert('insert into orders(order_id,user_id, product_id, quantity, order_date, ship_address, bill_address, payment_method) VALUES (?,?,?,?,?,?,?,?)',
            [$max_id,$id,$item->product_id,$item->quantity,$date,$address[0],$address[1],$payment]);

            DB::delete('delete from cart where user_id=? and product_id=?',[$id,$item->product_id]);
        }
        return redirect("order-status?id={$max_id}&date={$date}");
    }


    function recentorders(){
       
        $id = Session('LoggedUser');
        if($id == null){
            $id = 0; 
        }
        $items = DB::select('select * FROM orders NATURAL JOIN products WHERE user_id=?', [$id]);
        return view('recentorders',['items'=>$items]);
    }

    function profile(){
        $id = Session('LoggedUser');
        $details = DB::select('select * from admins where id=?',[$id]);
        $items = DB::select('select DISTINCT order_id,order_date,payment_method,user_id FROM orders WHERE user_id=?', [$id]);
        return view('dashboard',["details"=>$details,'items'=>$items]);
    }

}
