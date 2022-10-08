@extends('layouts.app')

@section('content')

<style>
    .hero {
        min-height: calc(100vh - 60px);
        background: url('./img/delivery.jpg')center/contain no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>


<!-- Home Page -->
<!-- <button id="CheckOut" modal-trigger class="green">Checkout</button> -->
<div id="successMessage"></div>

<ul id="idi">
    <li></li>
</ul>
<header class="hero">
    <div class="banner">
        <h1 class="banner-title">Easy Delivery</h1>
        <a href="#shoppingList" class="banner-btn">Shop now</a>
    </div>
</header>
<section class="product" id="shoppingList">
    <div class="section-title">
        <h2>Our Products</h2>
    </div>

    <div class="product-center">

        {{--
        <!-- {{$products}} --> --}}
        @foreach($products as $product)
        <article class="product ">
            <!-- materialboxed -->
            <div class="img-container card hoverable">
                <img src="img/{{$product->image_path}}" alt="product" class="product-img">
                <div class="emelie">
                    <button class="bag-btn addToCart" data-id="{{$product->id}}" data-name="{{$product->productName}}"
                        data-price="{{$product->productPrice}}" data-img="{{$product->image_path}}" data-quantity=1><i
                            class="fas fa-shopping-cart">Buy</i></button>
                    <button data-target="{{$product->id}}" class="modal-trigger view-btn" method="POST" name="views"
                        action="/views" type="submit" data-id="{{$product->id}}" data-name="{{$product->productName}}"
                        data-price="{{$product->productPrice}}" data-img="{{$product->image_path}}"><i
                            class="fas fa-eye" style="margin-left: -2px;"><span>Details</span></i></button>
                </div>

            </div>
            <div class="card-action grey lighten-2 z-depth-1">
                <h3 style="padding-bottom:0px;">{{$product->productName}}</h3>
                <h4>Price:${{$product->productPrice}}</h4>
            </div>
        </article>


        <div id="{{$product->id}}" class="modal card">
            <div class="modal-content row card-content">
                <h4><i> Details </i></h4>
                <div class="col s6 card-image">
                    <img src="img/{{$product->image_path}}" alt="product" class="product-img materialboxed">
                </div>
                <div class="col s6">
                    <h5>Product: {{$product->productName}}</h5>
                    <p>Price:{{$product->productPrice}}</p>
                    <br>
                    <div>
                        <p><i> {{$product->productDetail}}</i></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>

        @endforeach

    </div>

</section>


<div class="modal modalShadow">
    <div class="modal-content cart-content">
        <h2 class="centerTxt center">Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th class="sp">Product-id</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <!-- <tr>
                        <th>TOTAL</th>
                        <th></th>
                        <th class="totalCost"></th>
                    </tr> -->
            </tbody>
        </table>
        <p>
            <button id="closeModal" class="btn">Close</button>
            <button class="right btn" id="clearModal">Clear</button>

        </p>
        <div class="center">
            <br>
            <button id="contactCheck" modal-trigger class="btn">CheckOut</button>
        </div>
    </div>
</div>



<div class="modal" id="contactModal">
    <div class="modal-content grey lighten-3 center">
        <div class="card">
            <div class="card-content">
                <ul id="saveErr"></ul>
                <form id="contactForm" method="POST" action="/home" enctype="multipart/form-data">
                    <div class="row">
                        <!-- <div class="input-field col s6">
                        <input type="text" class="validate" name="pIddd" id="pIddd"  />
                        <label for="pIddd">Product id</label>
                    </div> -->

                        <div class="input-field col s6">
                            <input type="text" class="validate" name="contactName" id="contactName" />
                            <label for="contactName">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="contactLName" id="contactLName"
                                placeholder="Optional" />
                            <label for="contactLName">Last Name</label>
                        </div>
                        <div class="input-field col s6">
                            <label for="contactEmail">Email</label>
                            <input type="email" class="validate" name="contactEmail" id="contactEmail" />
                        </div>
                        <div class="input-field col s6">
                            <input type="tel" class="validate" required name="contactNumber" id="contactNumber"
                                data-length="11" onKeyPress="if(this.value.length==11) return false;" />
                            <label for="contactNumber">Phone Number</label>
                        </div>

                        <div class="input-field col s6">
                            <textarea id="contactMessage" name="contactMessage" class="materialize-textarea"
                                data-length="50"></textarea>
                            <label for="contactMessage">Message</label>
                        </div>
                    </div>
                    <button type="submit" id="contactBtn" name="contactBtn" class="btn teal waves-effect waves-light">
                        Send<i style="position:relative;top:0.3rem;left:0.5rem;" class="material-icons">send</i>
                    </button>

                </form>
            </div>
        </div>

    </div>

</div>


<footer class="page-footer teal" id="">
    <div class="footer-copyright">
        <div class="container black-text" style="width:80%;">
            Easy Delivery &copy; 2021-
            <?php 
                       $today = date("Y"); echo "$today";
                     ?>
            <div class="right black-text">
                <ul>
                    <li class="clock">
                        <span class="icon">
                            <i class="far fa-clock"></i>
                        </span>
                        <span class="text clocks">
                            <span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="left-area right black-text">
                <ul style="padding-right: 10px;">
                    <li>
                        <span class="icon">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        <span class="text">
                            <span id="date"></span>
                            <span id="month"></span>
                            <span id="year"></span>
                        </span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection
@section('script')

@endsection