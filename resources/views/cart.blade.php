@extends('layout')
@section('title')My Cart @endsection
@section('content')
<div class="container-fluid main pad">
    <h1>My cart</h1>
    <br>
    <div class="row">
        <div class="offset-7 offset-sm-6 col-1">Price</div>
        <div class="col-2 offset-1">Quantity</div>
    </div>
    <hr>
    @foreach( $items as $item )
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
        <div class="col-3 col-sm-2 offset-sm-1">
            <input type="number" name="quantity" class="quantity" class="quantity" min="1" max="10" value="1">
        </div>
        <div class="col-2 offset-8 col-sm-2 offset-sm-0">
        <form action="/remove/{{$item->product_id}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger remove">Remove</button>
        </form>
        </div>
    </div>
    <br><br>
@endforeach
    <hr>
    <div class="row">
        <div class="col-5 col-md-2 offset-7 offset-md-9">
            <p>Items Cost: $<span id="add"></span></p>
            <p>Shipping: $<span id="ship"></span></p>
            <p>Discount: $<span id="discount"></span></p>
            <p>Total price: $ <span id="total"></span></p>
            <a href="updatecart?" name="button" class="btn btn-danger">Checkout</a>
        </div>
    </div>
</div>
<script>
    const number = document.querySelectorAll(`input[name="quantity"]`);
    let a = document.querySelector(`a[name="button"]`);
    a.addEventListener('click',(e)=>{
        e.preventDefault();
        a.href = "updatecart?"
        number.forEach(quantity => {
            a.href += `quantity[]=${quantity.value}&`
    })
        window.location.href = a.href;
    })
     
</script>
<script src="{{asset('js/main.js')}}"></script>
@endsection