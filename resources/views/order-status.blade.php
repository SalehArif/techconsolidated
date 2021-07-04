@extends('layout')
@section('title')Order Status @endsection
@section('content')
    <div class="container-fluid main pad">
        <h1>Order Status</h1>
        <p>Order# {{$order_id}}</p>
        <p>Your Order will be Delivered by {{$month}} {{$day+1}}-{{$day+3}}</p>
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary"><i class="fa fa-check"></i>{{$month}} {{$day}} : Processing Order</li>
            <li class="list-group-item list-group-item-secondary">{{$month}} {{$day+1}} : Packaged Order</li>
            <li class="list-group-item list-group-item-secondary">{{$month}} {{$day+2}} : Shipped</li>
            <li class="list-group-item list-group-item-secondary">{{$month}} {{$day+3}} : Delivered</li>
        </ul>
        <br>
        <a href="receipt?id={{$order_id}}" class="btn btn-primary col-4 offset-4">Order Receipt</a>
    </div>
    <script>
        const li =  document.querySelectorAll('.list-group-item');
        const month = new Date().getMonth()+1;
        const day = new Date().getDate();
        const months = {1: "January", 2: "Febuary", 3:"March",4:"April",5:"May", 6:"June", 7:"July",8: "August",9:"September",10:"October",11:"November",12:"December"}
        li.forEach((item,index)=>{
            let text = item.innerText
            let dates = text.split(" ",2)
            if(dates[0]>=months[month] && dates[1]>=day){
            item.className = "list-group-item list-group-item-primary";
            item.innerHTML = `<i class="fa fa-check"></i>`+text
            }
        })

    </script>
@endsection