@extends('layout')
@section('title')  @endsection

@section('content')
<div class="container-fluid main">
    <div class="row">
        <h1 class="col-12">{{$details->name}}</h1>
        <img src="{{$details->picture}}" alt="" class="d-block col-12 col-sm-5 img-responsive">
        <div class="col-5 offset-sm-2">
            <h2>{{$details->caption}}</h2>
            <h3>Price: ${{$details->price}}</h3>
            @for($i = 1; $i <= 5 ; $i++)
            
            @if($i<=$details->rating)
            <span class="fa fa-star checked"></span>
            @else
            <span class="fa fa-star"></span>
            @endif

            @endfor
            <p>{{$details->catchphrase}}</p>
            <form action="/addtocart/{{$details->product_id}}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Add to Cart</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <h2>Product Specs</h2>
        <div class="col-12">
        {!!html_entity_decode($details->details)!!}
            
        </div>
    </div>
    <h2>Reviews</h2>
    @foreach($reviews as $review)
    <div class="row review">
        <img src="{{$review->profile_picture}}" alt="" class="col-3 col-sm-2 round">
        <div class="col-10">
            <br>
            <h4 class="">{{$review->username}}</h4>
            @for($i = 1; $i <= 5 ; $i++)
            
            @if($i<=$review->user_rating)
            <span class="fa fa-star checked"></span>
            @else
            <span class="fa fa-star"></span>
            @endif

            @endfor
            <!-- <h4 class="col-12">Review:</h4> -->
            <p  class="">{{$review->review}}</p>
        </div>
    </div>
    <br>
    @endforeach

    @if(!$isReviewed)
    <div class="row review">
        <img src="img/pfp.jpg" alt="" class="col-3 col-sm-2 round">
        <div class="col-10">
            <br>
            <h4>Post a review as "Current user"</h4>
            <form action="/addreview/{{$details->product_id}}" method="post">
            @csrf
            <textarea name="review" id="" cols="30" rows="1" placeholder="Write your honest thoughts"></textarea><br>
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
            <div class="clr"></div>
            <button class="btn btn-primary">Post</button>
        </div>
    </div>
    @endif

</div>
@endsection