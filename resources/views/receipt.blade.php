@extends('layout')
@section('title')Receipt @endsection
@section('content')
    <div class="container-fluid main pad">
        <div class="container white pad">
        <h1 class="d-flex justify-content-center">Receipt</h1>
        <br>
        <div class="row end">
            <h2 class="col-4">My Order</h2>
            <p class="col-2 offset-5">Order# {{ $items[0]->order_id }}</p>
        </div>
        <hr>
        @foreach( $items as $item)
        <div class="row">
            <div class="col-5 offset-2">
                <img src="{{$item->picture}}" alt="" class="sm-responsive">
            </div>
            <div class="col-2 col-sm-2">
                <h3>{{$item->name}}</h3>
                <p>Price: $<span  class="price">{{$item->price}}</span></p>
                <p>Quantity: <span class="quantity">{{$item->quantity}}</span></p>
                <p>Total: $ <span class="total"></span></p>
            </div>
        </div>
        <br>
        @endforeach
        <!-- <div class="row">
            <div class="col-5 offset-2">
                <img src="img/960x0.jpg" alt="" class="sm-responsive">
            </div>
            <div class="col-2 col-sm-2">
                <h3>Vostro 3400</h3>
                <p >Price: $<span  class="price">580</span></p>
                <p >Quantity: <span class="quantity">1</span></p>
                <p >Total: $<span class="total"></span></p>
            </div>
            <div class="offset-2 col-2 col-sm-1">
            </div>
        </div> -->
        <hr>
    <div class="row">
        <div class="col-5 col-md-2 offset-7 offset-md-9">
            <p>Items Cost: $<span id="add"></span></p>
            <p>Shipping: $<span id="ship"></span></p>
            <p>Discount: $<span id="discount"></span></p>
            <p>Total price: $ <span id="total"></span></p>
        </div>
    </div>
        </div>
    </div>
    <script src="{{asset('js/prices.js')}}"></script>
    @endsection
       