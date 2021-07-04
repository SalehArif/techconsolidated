@extends('layout')
@section('title')Tech Consolidated | Home @endsection


@section('content')
    <style>
        h2{
            color: rgb(223, 203, 203);
            text-align: center;
        }
        h4{
    font-size:large;
    text-align:center;
    margin-top:3.5%;
}
    </style>
    <form action="/search" method="post" class="search input-group rounded">
    @csrf
        <input type="text" name="search" id="txtSearch" class="form-control rounded" placeholder="Search Products">
        <button type="submit" class="btn" disabled><i class="fa fa-search"></i></button>
    </form>    
    <div id="search_suggest" style="margin-top=0px !important; padding-top=0px !important; margin: 0% 19% 4% 19%;" class=""></div>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <a href="product?id=10"><img src="img/photo-1498050108023-c5249f4df085.jpg" class="d-block w-100" alt="..."></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Inspiron 15 3000 Laptop</h5>
                <p>Ready to roll 15.6-inch laptop featuring responsive performance in a sleek design with 2-sided narrow borders</p>
            </div>
            </div>
            <div class="carousel-item">
            <a href="product?id=11"><img src="img/photo-1610890010404-f38f67d37fce.jpg" class="d-block w-100" alt="..."></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Vostro 3400 Laptop</h5>
                <p>14-inch laptop featuring an FHD display with a 2-sided narrow border, an ExpressCharge™ battery and 11th Gen Intel® Core™ processors.</p>
            </div>
            </div>
            <div class="carousel-item">
            <a href="product?id=12"><img src="img/photo-1592919933511-ea9d487c85e4.jpg" class="d-block w-100" alt="..."></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Gladiator 3400</h5>
                <p>a choice of Intel® Celeron® or Intel® Pentium® processors.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
        
    <br>
    <div class="container-fluid">
        <div class="row bg">
            <div class="col-12 col-md-8">
                <h2>Wireless Noise Cancelling Headphones</h2>
                <p>WH-CH700N headphones take you even deeper into silence with further improvements to our industry-leading noise cancellation, and smart listening that adjusts to your situation.</p>
            <a href="product?id=6" class="btn btn-danger"> View More >></a>
            </div>
            <div class="col-6 col-md-4 offset-6 offset-md-0"><img src="img/images.png" class="sm-responsive" alt=""></div>
        </div>
        <br>
        <div class="row bg">
            <div class="col-12 col-md-8">
                <h2>G5 Gaming Desktop</h2>
                <p>Powerful, compact gaming desktop with easy upgradeability and up to 10th Gen Intel® Core™ i9 CPUs, VR-capable GPUs and up to 64GB DDR4 RAM.</p>
            <a href="product?id=2" class="btn btn-danger"> View More >></a>
            </div>
            <div class="col-6 col-sm-4 offset-6 offset-sm-0"><img src="img/pc-case-png-7.png" class="sm-responsive" alt=""></div>
        </div>
        <div class="row bg">
            <div class="col-12 col-md-8">
                <h2>ThinkVision P44w</h2>
                <p>Offering a stunning visual experience, the ThinkVision P44w-10 allows you to be more productive every day. The 43.4-inch large screen real estate and the wide viewing angle make content creation and consumption exceptional.</p>
            <a href="product?id=16" class="btn btn-danger"> View More >></a>
            </div>
            <div class="col-6 col-sm-4 offset-6 offset-sm-0"><img src="img/Acer_Monitor_K243Y_K273_modelmain.png" class="sm-responsive" alt=""></div>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="container-fluid content">
            <h2>Categories</h2>
            <div class="row">
                <div class="col-6 col-md-4 img cat">
                    <img src="img/pc-case-png-7.png" class="sm-responsive" alt="">
                    <h3>Desktop</h3>
                </div>
                <div class="col-6 col-md-4 img cat">
                    <img src="img/images.png" class="sm-responsive" alt="">
                    <h3>Headphones</h3>
                </div>
                <!-- laptop, monitors, keyboard, mouse -->
                <div class="col-6 col-md-4 img cat">
                    <img src="img/Monitor-PNG-Background-Image.png" class="sm-responsive" alt="">
                    <h3>Monitor</h3>
                </div>
                <div class="col-6 col-md-4 img cat">
                    <img src="img/purepng.com-laptopelectronicslaptopcomputer-941524676166s0nuj.png" class="sm-responsive" alt="">
                    <h3>Laptop</h3>
                </div>
                <div class="col-6 col-md-4 img cat">
                    <img src="img/Gaming-Keyboard-PNG-Picture.png" class="sm-responsive" alt="">
                    <h3>Keyboard</h3>
                </div>
                <div class="col-6 col-md-4 img cat">
                    <img src="img/Daco_4601128.png" class="sm-responsive" alt="">
                    <h3>Mouse</h3>
                </div>

            </div>
    </div>
    <br>
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
                        <!-- <p class="d-none d-md-block">{{substr($product->catchphrase,0,80)}}</p> -->
                        <h4>Price: ${{$product->price}}</h4>
                    </figure>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
    <br>
    <script>
        const category = document.querySelectorAll('.cat')
        
        category.forEach(thing => thing.addEventListener('click',() => {
       
            if(event.target.tagName==='DIV'){
                const category = event.target.children[1].innerText
                window.location.href = `products?category=${category}`;
            }else{
                const category = event.target.nextElementSibling.innerText
                window.location.href = `products?category=${category}`;
            }

        }));

        const searchbar = document.getElementById('txtSearch');
        searchbar.addEventListener('keyup',searchSuggest);

        function searchSuggest(){
            let str = document.getElementById('txtSearch').value;
        
            document.getElementById('search_suggest').innerHTML = "";
            document.getElementById('search_suggest').style.border ="0px";

            searchReq = new XMLHttpRequest();

            let url = `/search?search=${str}`;
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