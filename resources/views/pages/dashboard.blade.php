@extends('layouts.app')

@section('content')
<style>
body{
    /* background: url('./media/img/ecommer.png')no-repeat; */
    /* background-color:black; */
    background-attachment: fixed;
    background-size: 50rem;
    background-position: center;
}
.container {
  margin: 0 auto;
  max-width: 1280px;
  width: 80%;
}
</style>

<div class="sidebar z-depth-1">
    <ul class="">
        <li class="tab0"><a class="active" href="../public/"><i class="material-icons prefix left">home</i>Home</a></li>
        <li class="tab1"><a href="#userProfile"><i class="material-icons prefix left">account_circle</i>User Profile</a></li>
        <li class="tab2"><a href="#notification"><i class="material-icons prefix left">notifications_active</i>Notification

            <span class="new badge red">65</span>
    
        </a>
        </li>
        </a></li>
        <li class="tab3"><a href="#deliveryAgent"><i class="material-icons prefix left">account_circle</i>Delivery Agents</a></li>
        <li class="tab4"><a href="#setting"><i class="material-icons prefix left">settings</i>Setting</a></li>
    </ul>
</div>
<div id="home" class="content">
Ecommerce Agent Dashbord

    <div class="container card">
        <div class="card-content" style="padding-left: 24px; padding-right: 24px; padding-top: 0px; padding-bottom: 0px;">
        <h1>Products</h1>
        <h2>
            All Products
            <a class="btn-floating btn-large waves-effect waves-light teal right modal-trigger pulse" href="#productModal"><i class="material-icons">add</i></a>
        </h2>
        
        </div>

        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Product</th> 
                    <th>Posted By</th> 
                    <th>Modified</th> 
                    <th><i class="material-icons blue-text">edit</i></th>
                    <th><i class="material-icons red-text">delete</i></th>
                </tr>
            </thead>

            
            <tbody>
                @if(count($products) > 0)
                    @foreach($products as $product)
                    
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->productPrice}}</td>
                        <td>{{$product->productDetail}}</td>
                        <td><img src="./img/delivery.jpg" class="responsive-img" width="60px"></td>
                        <td>{{$user->name}}</td>
                        <td>{{date("jS M Y", strtotime($product->updated_at)) }}</td>
                        <td><a href="#" class="editProductModal blue-text"  data-productId="id" data-name="productName" data-price="productPrice" data-details="productDetail" data-img="productImg"><i class="material-icons">edit</i></a></td>
                        <td><a href="#" class="delProductModal red-text" data-productId="id" data-name="productName" data-price="productPrice" data-details="productDetail" data-img="productImg"><i class="material-icons">delete</i></a></td>
                    <tr> 
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="center-align"><i>No Product yet</i><td>
                    </tr>
                @endif


                    
            
            </tbody>
        </table>
    </div>
        
</div>

@endsection
