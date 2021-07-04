@extends('layout')
@section('title')Checkout @endsection
@section('content')
    <div class="container-fluid main pad">
        <h1>Delivery Details</h1>
        <hr>
        <h2>Shipping Address</h2>
        <div class="row">
            <p class="col-6 add">Islamabad, Pakistan</p>
            <button class="btn btn-success offset-4 edit"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-success add"><i class="fa fa-plus"></i></button>
        </div>
        <h2>Billing Address</h2>
        <div class="row">
            <p class="col-6 add">Islamabad, Pakistan</p>
            <button class="btn btn-success offset-4 edit"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-success add"><i class="fa fa-plus"></i></button>
        </div>
        <h2>Payment Method</h2>
        <div class="row">
            <select name="payment" id="" class="col-6 offset-3 form-control" required>
                <option value="" selected>Choose a Method</option>
                <option value="cod">Cash On Delivery</option>
                <option value="credit">Credit Card</option>
            </select>
            <p class="col-4 offset-4 delivery"></p>
        </div>
        <br>
        <br>
        <h1>My Order</h1>
        <br>
        <div class="row">
            <p class="offset-7 offset-sm-6 col-1">Price</p>
            <p class="col-2 offset-1">Quantity</p>
            <p class="col-1">Total</p>
        </div>
        <hr>
        @foreach( $items as $item)
        <div class="row">
            <div class="col-3">
                <img src="{{$item->picture}}" alt="" class="sm-responsive">
            </div>
            <div class="col-2 col-sm-1">
                <h3>{{$item->name}}</h3>
            </div>
            <div class="offset-2 col-2 col-sm-1">
                <p>$<span  class="price">{{$item->price}}</span></p>
            </div>
            <p class="col-3 col-sm-2 offset-sm-1 quantity">{{$item->quantity}}</p>
            <p class="col-2 offset-8 col-sm-2 offset-sm-0">$<span class="total"></span></p>
        </div>
        <br>
        @endforeach
        <hr>
        <div class="row">
            <!-- <p class="col-2">Order# 190xa92n31</p> -->
            <div class="col-5 col-md-2 offset-7 offset-md-9">
                <p>Items Cost: $<span id="add"></span></p>
                <p>Shipping: $<span id="ship"></span></p>
                <p>Discount: $<span id="discount"></span></p>
                <p>Total price: $ <span id="total"></span></p>
            </div>
        <a href="order-status"  name="button" class="btn btn-primary col-4 offset-4">Confirm Order</a>
        </div>
    </div>
    <script>
        const address = document.querySelectorAll(`.add`);
        let payment = document.querySelector(`select[name="payment"]`);
        let a = document.querySelector(`a[name="button"]`);
        a.addEventListener('click',(e)=>{
        e.preventDefault();
        a.href = "makeorder?"
        address.forEach(add => {
            if(add.innerText!='')
                a.href += `address[]=${add.innerText}&`
    })
        a.href+= `pay=${payment.value}`
        window.location.href = a.href;
    })
    </script>
    <script src="{{asset('js/delivery.js')}}"></script>
    <script src="{{asset('js/prices.js')}}"></script>
@endsection
 