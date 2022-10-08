@extends('layouts.app')

@section('content')

products

   {{$products}}
    
    @if(Auth::check())
    <div ><a href="/blog/create" class="btn">create Post</a></div>
    
    @endif
    
    @foreach($products as $product)
    <h2>{{$product->slug}}</h2>
    <h2>{{$product->id}}</h2>
    <h2>{{$product->user_id}}</h2>
    <h2>{{$product->user->name}}</h2>
    <ul>
        <li class="red-text">{{$product->productName}}</li>
        <li class="red-text">{{$product->productPrice}}</li>
        <li class="red-text">{{$product->productDetail}}</li>
        <li class="red-text">{{date("jS M Y", strtotime($product->updated_at)) }}</li>
        <li><a href="/blog/{{$product->slug}}">Read more</a></li>
    </ul>
    
    @endforeach
@endsection


