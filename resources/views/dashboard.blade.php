@extends('layout')   
@section('title') {{$details[0]->username}} | Profile @endsection

@section('content')
<link rel="stylesheet" href="css/dashboard.css">
<div class = "dashboard_container">
    <div class="leftbox">
        <nav>
            <a onclick="tabs(0)" class="tab" active>
            <i class="fa fa-user"></i>
            </a>
            <!-- <a onclick="tabs(1)" class="tab">
                <i class="fa fa-credit-card"></i>
            </a> -->
            <a onclick="tabs(1)" class="tab">
                <i class="fa fa-history"></i>
            </a>
        </nav>
    </div>
    <div class="rightbox">
        <div class="profile tabShow">
            
            <h1>User Profile</h1>
            <h2>Full Name</h2>
            <p>{{$details[0]->username}}</p>
            
            <!-- <h2>Date of Birth</h2>
            <input type="date" class="input" value ="20/12/1979">
            <h2>Gender</h2>
            <select  class="input" name="Gender" id="Gender">
                <option  class="input" value="Select Gender"> Gender</option>
                <option value="Male"> Male </option>
                <option value="Female"> Female</option>
            </select> -->
            <h2>Email</h2>
            <p>{{$details[0]->email}}</p>
            <!-- <button class="button">Update</button> -->
        </div>
        <!-- <div class="payment tabShow">
            <h1>Payment Info</h1>
            <h2>Debit/Credit Card Type</h2>
            <select class="input" name="Select Card" id="card">
                <option value="Select Card">  Card</option>
                <option value="Master"> Master </option>
                <option value="Visa"> Visa</option>
                <option value="UnionPay"> UnionPay</option>
                <option value="PakPay"> PakPay</option>
            </select>
            <h2>Card Number</h2>
            <input type="text" class="input" value ="2473 **** **** 9314">
            <h2>Date of Expiry</h2>
            <input type="date" class="input" value ="03/07/2022">
            <h2>CVV</h2>
            <input type="password" class="input" value ="477">
            <h2>Postal Code</h2>
            <input type="text" class="input" value ="492000">
            <button class="button">Update</button>
        </div> -->

        <div class="Recent Order tabShow">
        <h1>Orders Placed</h1>
        @foreach($items as $item)
        <p><a href="order-status?id={{$item->order_id}}&date={{$item->order_date}}">Order id: {{$item->order_id}} Order Date: {{$item->order_date}}</a></p>
        @endforeach
            <!-- <h2>Product Id</h2>
            <p>137774</p>
            <h2>Product Name</h2>
            <p>Inspiron 15 3000 Laptop</p>
            <h2>Date of Order</h2>
            <p>26/03/2021</p>
            <h2>Price</h2>
            <p>$2500</p>
            <h2>Quantity</h2>
            <p>1</p>
            <button class="button">Update</button> -->
        </div>
 
    </div>

</div>

<script src="jquery/jquer.js"></script>
<script>
    const tabbutton = document.querySelectorAll(".tab");
    const tab = document.querySelectorAll(".tabShow");
    function tabs(panelIndex){
        tab.forEach(function(node){
            node.style.display ="none";
        });
        tab[panelIndex].style.display = "block";
    }
    tabs(0);
</script>
<script>
    $(".tab").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    })
</script>

@endsection