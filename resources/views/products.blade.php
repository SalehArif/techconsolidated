@extends('layout')
@section('title')Products @endsection
@section('content')
    <style>
        
        h2{
            color: rgb(223, 203, 203);
            text-align: center;
        }
        h3{
    font-size:large;
    text-align:center;
    margin-top:3.5%;
}
    </style>
    <form action="/search" method="post" class="search input-group rounded">
    @csrf
        <input type="text" name="search" id="txtSearch" class="form-control rounded" placeholder="Search Products">
        <select name="category" id="">
            <option value="" selected>Categories</option>
            <option value="monitor">Monitors</option>
            <option value="desktop">Desktops</option>
            <option value="laptop">Laptops</option>
            <option value="keyboard">Keyboards</option>
            <option value="mouse">Mouses</option>
            <option value="headphones">Headphones</option>
        </select>
        <button type="submit" class="btn" disabled><i class="fa fa-search"></i></button>
    </form>    
    <div id="search_suggest" style="margin-top=0px !important; padding-top=0px !important; margin: 0% 19%;" class=""></div>

    <div class="container-fluid">
        <div class="container-fluid content">
            <h2>Our Products</h2>
            <div class="row">
            @foreach( $products as $product)
                <div class="col-4 col-md-2 img">
                    <figure>
                        @if($product->product_id == 6)
                        <a href="product?id={{$product->product_id}}"><img src="{{$product->picture}}" alt="" class="md-responsive"></a>
                        @else
                        <a href="product?id={{$product->product_id}}"><img src="{{$product->picture}}" alt="" class="responsive"></a>
                        @endif
                        <figcaption>{{$product->name}}</figcaption>
                        <!-- <p class="d-none d-md-block">{{substr($product->catchphrase,0,50)}}</p> -->
                        <h3>Price: ${{$product->price}}</h3>
                    </figure>
                </div>
            @endforeach
                </div>
        </div>
    </div>
    <script>
        const searchbar = document.getElementById('txtSearch');
        let cat = document.querySelector('select');
        searchbar.addEventListener('keyup',searchSuggest);
        cat.addEventListener('change',searchSuggest);

        function searchSuggest(){
            let str = searchbar.value;
            let select = cat.value
            document.getElementById('search_suggest').innerHTML = "";
            document.getElementById('search_suggest').style.border ="0px";

            searchReq = new XMLHttpRequest();

            let url = `/search?search=${str}&category=${select}`;
            searchReq.open("GET",url)
            searchReq.send()   
            
            searchReq.onreadystatechange = function(){
                if(searchReq.readyState == 4 && searchReq.status == 200){
                    const JSONResponse = JSON.parse(searchReq.responseText);
                    for(let item in JSONResponse){
                        const add = document.querySelector('#search_suggest');
                        let div = document.createElement('div');
                        let p = document.createElement('p');
                        let a = document.createElement('a');
                        let img = document.createElement('img');

                        img.className = "cs-responsive";
                        img.src = `${JSONResponse[item].picture}`
                        let text = document.createTextNode(" "+JSONResponse[item].name);
                        let price = document.createTextNode(" $"+ JSONResponse[item].price);

                        a.href = `product?id=${JSONResponse[item].product_id}`

                        a.appendChild(img);
                        a.appendChild(text);
                        p.appendChild(a);
                        p.appendChild(price);
                        div.appendChild(p);
                        add.appendChild(div);

                        add.style.border ="1px solid black";
                        add.style.background ="white";
                        add.style.color ="black";
                    }
                }
            };
        }
    </script>
    
@endsection