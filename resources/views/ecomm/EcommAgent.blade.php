@extends('layouts.app')

@section('content')


<style>
    body {
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

    #profileImg {
        /* margin: 3vh auto 0 auto;
width: 18vw;
height: 39vh;
z-index: -1; */
    }
</style>

<div class="sidebar z-depth-1">
    <ul class="">
        <li class="tab0"><a class="active" href="#home"><i class="material-icons prefix left">home</i>Home</a></li>
        <li class="tab1"><a href="#userPro"><i class="material-icons prefix left">account_circle</i>User Profile</a>
        </li>
        <li class="tab2"><a href="#notification"><i
                    class="material-icons prefix left">notifications_active</i>Notification

                <span class="new badge red">65</span>

            </a>
        </li>
        </a></li>
        <li class="tab3"><a href="#deliveryAgent"><i class="material-icons prefix left">account_circle</i>Delivery
                Agents</a></li>
        <li class="tab4"><a href="#setting"><i class="material-icons prefix left">settings</i>Setting</a></li>
    </ul>
</div>
<div id="home" class="content">
    <div class="container card z-depth-4">
        <div class="card-content"
            style="padding-left: 24px; padding-right: 24px; padding-top: 0px; padding-bottom: 0px;">
            <h2>ecom</h2>
            <div class="" id="successMessage"></div>
            @if(session()->has('message'))
            <div id="" class="green">
                <h5 class="white-text center">
                    {{session()->get('message')}}
                    </h4>
            </div>
            @endif
            <a class="btn-floating btn-large waves-effect waves-light teal right modal-trigger pulse pauseMe"
                href="#productModal"><i class="material-icons">add</i></a>
        </div>

        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>ID</th>
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


            <tbody class="tbody">

            </tbody>
        </table>
    </div>
</div>

<div id="productModal" class="modal">
    <div class="modal-content">
        <h3>PRODUCT</h3>

        <ul id="saveErr"></ul>

        <div class="row">

            <form method="POST" id="proForm" enctype="multipart/form-data">
                @csrf
                <div class="input-field col s6">
                    <input type="text" id="productName" name="productName" class="validate productName"
                        placeholder="Product Name">
                    <label for="productName">Product Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="productPrice" class="validate productPrice" placeholder="Product Price">
                    <label for="productPrice">Product Price</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn-small">
                        <span>Product</span>
                        <input type="file" name="image_path" id="image_path" class="image_path">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="productDetail" name="productDetail" class="validate productDetail"
                        placeholder="Product Description">
                    <label for="proDetails">Product Description</label>
                </div>
                <div class="modal-footer">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right addProduct" type="submit" name="productBtn"
                            id="productBtn">Create
                            <i class="material-icons right">edit</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="editModal" class="modal">
    <div class="modal-content">
        <h4>Edit Product</h4>

        <ul id="saveErr2"></ul>

        <div class="row">
            <!-- SHOW D USERS PARTICULAR POST -->
            <form method="POST" action="/ecomm" enctype="multipart/form-data" id="editForm">

                @csrf
                @method('PUT')
                <div class="input-field col s12">
                    <input type="text" id="editProductId">

                </div>
                <div class="input-field col s6">
                    <input type="text" id="editProductName" name="productName" class="val" placeholder="Product Name">
                    <label for="productName">Product Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="editProductPrice" name="productPrice" class="val2"
                        placeholder="Product Price">
                    <label for="productPrice">Product Price</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn-small">
                        <span>Product</span>
                        <input type="file" name="image_path" class="image_path">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="editProductDetail" name="productDetail" class="val3"
                        placeholder="Product Description">
                    <label for="proDetails">Product Description</label>
                </div>
                <div class="modal-footer">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right" type="submit" id="updateProduct">Edit
                            <i class="material-icons right">edit</i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="deleteProductModal" class="modal">
    <div class="modal-content center-align">

        <input type="text" id="deleteProductId">

        <h4>Delete Product</h4>
        <p>Are you sure you want to delete this Product</p>
        <div>
            <button class="btn-large waves-effect waves-light red" id="doDeleteproduct">Yes</button>
            <button class="btn-large waves-effect waves-light modal-close">No</button>
        </div>
    </div>
</div>

<div id="verifyModal43" class="modal">
    <div class="modal-content">
        <h6>TO Become An Ecommerce Agent Click On The Link Below</h6>
        <p>Click on this link to complete your verification <a href="/ecomForm"
                style="text-decoration:underline;">Here?</a></p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<div id="userPro" class="content">
    <div class="row">
        {{-- <div class="col s12 m5">
            <div class="card">
                <div class="card-image" id="image">

                </div>
                <div class="card-content">
                    <span class="card-title">Profile</span>
                    <ul class="userPro"></ul>
                </div>
            </div>
        </div> --}}
        <div class="col s12">
            <div class="container">
                <!-- users edit start -->
                <div class="section users-edit">
                    <div class="card">
                        <div class="card-content">
                            <!-- <div class="card-body"> -->
                            <ul class="tabs mb-2 row">
                                <li class="tab">
                                    <a class="display-flex align-items-center active green-text" id="account-tab" href="#account">
                                        <i class="material-icons  mr-1"
                                            style="vertical-align: middle">person_outline</i><span>Account Info</span>
                                    </a>
                                </li>
        
                                <li class="indicator" style="left: 0px; right: 530px;"></li>
                            </ul>
                            <div class="divider mb-3"></div>
                            <div class="row">
                                <div class="col s12 active" id="account" style="display: block;">
                                    <!-- users edit media object start -->
                                    <div class="media display-flex align-items-center mb-2">
                                        <a class="mr-2" href="#" id="image">
                                            {{-- <img src="img/svg_male.png" alt="users avatar" class="z-depth-4 circle" height="64"
                                                width="64"> --}}
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading mt-0">Avatar</h5>
                                            <div class="user-edit-btns display-flex">
                                                <a href="#" class="btn-small indigo">Change</a>
                                                <a href="#" class="btn-small btn-light-pink">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form id="accountForm" action="#!">
                                        <div class="row userPro">
                                            {{-- append info  below --}}
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
        
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</div>

<div id="notification" class="content">
    <div class="">
        <div class="container">
            <div class="card">
                <table class=" responsive-table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Product</th>
                            <th>img</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div id="deliveryAgent" class="content">
    <div class="">
        <!-- <div class="col s12 m5">
            <div class="card">
                deliveryAgent
            </div>

        </div> -->
        <div class="container">
            <h2>Delivery Agent</h2>
            <table class=" responsive-table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Gender</th>
                        <th>userType</th>
                        <th>Date joined</th>
                        <th>img</th>
                        <th>Statues</th>
                    </tr>
                </thead>
                <tbody id='agentData'>

                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div id="setting" class="content" >
    <div class="row">
        <div class="col s12 m5">
            <div class="card">
                setting
            </div>
        </div>
    </div>   -->
<div id="setting" class="content">
    <div class="container">
        <h2>General Account Settings</h2>
        <h5>{{Auth::user()->firstname}}'s Profile</h5>
        <div class="responsive ">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <table class="striped  updatePro">
                <tr>
                    <td>First Name</td>
                    <td>{{Auth::user()->firstname}}</td>
                    <td><a class="waves-effect waves-light btn btn-small modal-trigger" id="update1"
                            data-target="updatefName" data-id="'+ item.firstname + '">Update</a></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>{{Auth::user()->lastname}}</td>
                    <td><a class="waves-effect waves-light btn btn-small modal-trigger" data-target="updatelName"
                            data-id="'+ item.id + '">Update</a></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>{{Auth::user()->username}}</td>
                    <td><a class="waves-effect waves-light btn btn-small  modal-trigger" data-target="updateuName"
                            data-id="'+ item.id + '">Update</a></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{Auth::user()->email}}</td>
                    <td><a class="waves-effect waves-light btn btn-small  modal-trigger" data-target="updateEmail"
                            data-id="'+ item.id + '">Update</a></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>hidden</td>
                    <td><a class="waves-effect waves-light btn btn-small modal-trigger" data-target="updatepassword"
                            data-id="'+ item.id + '">Update</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="card cardClockDate white">
            <div class="center grey-text">
                <ul>
                    <li class="clock">
                        <span class="icon" style="vertical-align: sub;">
                            <i class="far fa-clock large"></i>
                        </span>
                        <span class="text clocks">
                            <span style="font-size:4rem;" id="hours"></span><i class="material-icons">more_vert</i><span
                                style="font-size:4rem;" id="minutes"></span><i class="material-icons">more_vert</i><span
                                style="font-size:4rem;" id="seconds"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- update firstname -->
<form method="POST" id="updatefNameForm" action="{{'ecomm'}}">
    <!-- Modal Structure -->
    @csrf
    <div id="updatefName" class="modal">
        <div id="updateusernamemessage"></div>
        <div class="modal-content">
            <h6>Edit First Name:</h6>
            <div class="input-field col s12">
                <input type="text" id="fName" name="fName" class="validate" value=""
                    placeholder="{{Auth::user()->firstname}}" minlength="4" maxlength="30" required>
            </div>
        </div>
        <div class="modal-footer">
            <button class="teal btn waves-effect waves-light" id="updateFirs" type="submit">submit</button>
            <a href="#!" class="modal-action modal-close btn-flat white">Close</a>
        </div>
    </div>
</form>
<!-- update lastname -->
<form method="POST" id="updatelNameForm" action="{{'lastname'}}">
    <!-- Modal Structure -->
    @csrf
    <div id="updatelName" class="modal">
        <div id="updateusernamemessage"></div>
        <div class="modal-content">
            <h6>Edit Last Name:</h6>
            <div class="input-field col s12">
                <input type="text" id="lName" name="lName" value="{{Auth::user()->lastname}}" class="validate"
                    placeholder="Last Name" maxlength="30" required>
            </div>
        </div>
        <div class="modal-footer">
            <button class="teal btn waves-effect waves-light" type="submit">submit</button>
            <a href="#!" class="modal-action modal-close btn-flat white">Close</a>
        </div>
    </div>
</form>
<!-- update username -->
<form method="POST" id="updateuNameForm" action="{{'username'}}">
    <!-- Modal Structure -->
    @csrf
    <div id="updateuName" class="modal">
        <div id="updateusernamemessage"></div>
        <div class="modal-content">
            <h6>Edit User Name:</h6>
            <div class="input-field col s12">
                <input type="text" id="uName" name="uName" value="{{Auth::user()->username}}" class="validate"
                    placeholder="Username" maxlength="30" required>
            </div>
        </div>
        <div class="modal-footer">
            <button class="teal btn waves-effect waves-light" type="submit">submit</button>
            <a href="#!" class="modal-action modal-close btn-flat white">Close</a>
        </div>
    </div>
</form>

<form method="POST" id="updateEmailForm" action="{{'email'}}">
    <!-- Modal Structure -->
    @csrf
    <div id="updateEmail" class="modal">
        <div id="updateusernamemessage"></div>
        <div class="modal-content">
            <h6>Edit User Name:</h6>
            <div class="input-field col s12">
                <input type="text" name="uEmail" value="{{Auth::user()->email}}" class="validate" placeholder="Username"
                    maxlength="30" required>
            </div>
        </div>
        <div class="modal-footer">
            <button class="teal btn waves-effect waves-light" type="submit">submit</button>
            <a href="#!" class="modal-action modal-close btn-flat white">Close</a>
        </div>
    </div>
</form>
<!-- update password -->
<form method="POST" id="updatepasswordform" action="{{'password'}}">
    @csrf
    <div id="updatepassword" class="modal">
        <div id="updatepasswordmessage"></div>
        <div class="modal-content">
            <h6>Enter Current and New password:</h6>
            <!-- login message from PHP file-->
            <!-- @if(Auth::user()->password) -->
            <!-- <div ><a href="/blog/create" class="btn">create Post</a></div> -->

            <!-- @endif -->
            @if(session()->has('messageError'))
            <div id="" class="white">
                <h5 class="red-text center">
                    {{session()->get('messageError')}}
                    </h4>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="red-text">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div id="forgotpasswordmessage"></div>
            <div class="input-field col s12">
                <input id="currentpassword" name="currentpass" type="password" placeholder="Your Current Password"
                    required maxlength="30">
                <span toggle="#currentpassword" class="field-icon toggle-password"><span
                        class="material-icons">visibility</span></span>
                <label for="currentpassword" class="hide">Current Password</label>
            </div>
            <div class="input-field col s12">
                <input type="password" id="passwords" data-length="8" placeholder="Password must be 8"
                    onKeyPress="if(this.value.length==8) return false;"
                    class="validate @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">
                <span toggle="#passwords" class="field-icon toggle-password"><span
                        class="material-icons">visibility</span></span>
                <label for="password" class="hide">Choose a Password</label>
            </div>
            <div class="input-field col s12">
                <input type="password" class="validate" data-length="8" name="password_confirmation" id="passwords2"
                    placeholder="Password must be 8" onKeyPress="if(this.value.length==8) return false;" required
                    autocomplete="new-password">
                <span toggle="#password2" class="field-icon toggle-password"><span
                        class="material-icons">visibility</span></span>
                <label for="password2" class="hide">Choose a Password</label>
            </div>
        </div>
        <div class="modal-footer">
            <button class="teal btn waves-effect waves-light" name="forgotpassword" type="submit"
                value="submit">submit</button>
            <a href="#!" class="modal-action modal-close btn-flat white">Close</a>
        </div>
    </div>
</form>


@endsection
@section('script')

<script>
    $(function () {
     
    fetchProduct();
    function fetchProduct() {
        $.ajax({
            type: "GET",
            url: "/fetch-EcommProduct",
            dataType: "json",
            success: function (response) {
                // console.log(response.product);
                if(response.product != ""){
                    // console.log(response);
                    $('.tbody').html("");
                    let i = 1
                 // i < 0 
                    $.each(response.product, function (key, item) {
                        $('.tbody').append(
                            '<tr>\
                                <td>'+ i++ + '</td>\
                                <td>'+ item.id + '</td>\
                                <td>'+ item.productName + '</td>\
                                <td>'+ item.productPrice + '</td>\
                                <td>'+ item.productDetail + '</td>\
                                <td><div><img class="materialboxed" src="img/'+item.image_path+'" style="width:85px;height:90px;"></div></td>\
                                <td>'+ item.username + '</td>\
                                <td>'+ item.updated_at + '</td>\
                                <td><a href="#" class="editProductModal editProduct blue-text" id="pauseMe2" modal-trigger data-id="'+ item.id + '"><i class="material-icons">edit</i></a></td>\
                                <td><a href="#" class="delProductModal red-text delProduct" id="pauseMe3"  modal-trigger data-id="'+ item.id + '"><i class="material-icons">delete</i></a></td>\
                            </tr>'
                        );

                    });
                    i++;
                }else{
                    // console.log('not here');
                    
                    $('.tbody').append(
                        '<tr>\
                            <td colspan="4" class="center-align"><i>'+ response.message+'.</i><td>\
                        </tr>'
                    );
                }
            }
        });
    }



    $(document).on('submit', '#proForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#proForm')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/pages",
            data: formData,
            cache:false,
            processData: false,
            contentType: false,
            success: function (response) {
                // console.log(response.errors.name);
                $('#saveErr').html("");
                $('#saveErr').addClass("red-text");
                if (response.status == 400) {
                    $.each(response.errors, function (key, errValues) {
                        $('#saveErr').append('<li>' + errValues + '</li>');
                    });
                } else {
                    $('#saveErr').html("");
                    $('#successMessage').addClass("green white-text");
                    $('#successMessage').text(response.message);
                    $('#productModal').modal('close');
                    $('#productModal').find('input').val("");
                    fetchProduct();
                }
            }
        });
    });

    $(document).on('click', '.editProduct', function (e) {
        e.preventDefault();

        //    let productId =  $(this).val();

        let productId = $(this).attr('data-id');
        // console.log(productId);
        $('#editModal').modal('open');

        $.ajax({
            type: "GET",
            url: "/editEcommProduct/" + productId,
            success: function (response) {
                // console.log(response);
                if (response == 404) {
                    $('#successMessage').html("");
                    $('#successMessage').text(response.message);
                    $('#successMessage').addClass("white red-text");
                } else {
                    $('#editProductDetail').val(response.product.productDetail);
                    $('#editProductName').val(response.product.productName);
                    $('#editProductPrice').val(response.product.productPrice);
                    $('#editProductId').val(productId);
                }
            }
        })

    })



$(document).on('submit', '#editForm', function (e) {
    e.preventDefault();

    var productId = $('#editProductId').val();
    let EditformData = new FormData($('#editForm')[0]); 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/updateEcommProduct/" + productId,
        data: EditformData,
        processData: false,
        contentType: false,
        success: function (response) {
            // console.log('cool');

            $('#saveErr2').html("");
            $('#saveErr2').addClass("red-text");
            if (response.status == 400) {
                $.each(response.errors, function (key, errValues) {
                    $('#saveErr2').append('<li>' + errValues + '</li>');
                });

                // $('#updateProduct').text('Updated.');

            } else if (response.status == 404) {
                $('#saveErr2').html("");
                $('#successMessage').text(response.message);
                $('#successMessage').addClass("white red-text");
                // $('#updateProduct').html('');
                // $('#updateProduct').text('Updated.');
                // console.log('not cool');


            } else {
                $('#saveErr2').html("");
                $('#successMessage').html("");
                $('#successMessage').text(response.message);
                $('#successMessage').addClass("green white-text");
                $('#editModal').modal('close');
                $('#editForm').find('input').val("");
                fetchProduct();
                location.reload();

            }

        }
    })

});

    $(document).on('click', '.delProduct', function (e) {
        e.preventDefault();

        let productId = $(this).attr('data-id');
        // alert(productId);
        $('#deleteProductId').val(productId)
        $('#deleteProductModal').modal('open');

    });

    $(document).on('click', '#doDeleteproduct', function (e) {
        e.preventDefault();

        let productId = $('#deleteProductId').val();
        // alert(productId);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/deleteEcommProduct/" + productId,
            success: function (response) {
                // console.log(response);
                $('#successMessage').html("");
                $('#successMessage').text(response.message);
                $('#successMessage').addClass("green white-text");
                $('#deleteProductModal').modal('close');
                fetchProduct();

            }
        })
    });


});

fetchProfile();
function fetchProfile() {
    $.ajax({
        type: "GET",
        url: "/fetch-EcommProfile",
        dataType: "json",
        success: function (response) {
            console.log(response.user);
            // console.log('emelechi');

            $.each(response.user, function (key, item) {
                $('.userPro').append(
                    // '<li>Name: ' + item.username + '</li>\
                    // <li>First Name: '+ item.firstname + '</li>\
                    // <li>Last Name Name: '+ item.lastname + '</li>\
                    // <li>Email: '+ item.email + '</li>\
                    // <li>UserType: '+ item.userType + '</li>\
                    // <li>Gender: '+ item.gender + '</li>\
                    // <li>Date Created: '+ item.created_at + '</li>\
                    // <li>Updated: '+ item.updated_at + '</li>'
                   '<div class="col s12 m6">\
                        <div class="row">\
                            <div class="col s12 input-field">\
                                <input id="username" name="username" type="text" class="validate" value="' + item.username + '" data-error=".errorTxt1">\
                                <label for="username" class="active">Username</label>\
                                <small class="errorTxt1"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="firstname" name="firstname" type="text" class="validate" value="'+ item.firstname + '" data-error=".errorTxt2">\
                                <label for="firstname" class="active">First Name</label>\
                                <small class="errorTxt2"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="gender" name="gender" type="text" class="validate" value="'+ item.gender + '" data-error=".errorTxt3">\
                                <label for="gender" class="active">Gender</label>\
                                <small class="errorTxt3"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="created_at" name="created_at" type="text" class="validate" readonly value="'+ item.created_at + '" data-error=".errorTxt3">\
                                <label for="created_at" class="active">Date Created</label>\
                                <small class="errorTxt3"></small>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col s12 m6">\
                        <div class="row">\
                            <div class="col s12 input-field">\
                                <input id="email" name="email" type="text" class="validate" value="'+ item.email + '" data-error=".errorTxt1">\
                                <label for="email" class="active">Email</label>\
                                <small class="errorTxt1"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="lastname" name="lastname" type="text" class="validate" value="'+ item.lastname + '" data-error=".errorTxt2">\
                                <label for="lastname" class="active">Last Name</label>\
                                <small class="errorTxt2"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="userType" name="userType" type="text" class="validate" value="'+ item.userType + '" data-error=".errorTxt3">\
                                <label for="userType" class="active">UserType</label>\
                                <small class="errorTxt3"></small>\
                            </div>\
                            <div class="col s12 input-field">\
                                <input id="updated_at" name="updated_at" type="text" class="validate" readonly value="'+ item.updated_at + '" data-error=".errorTxt3">\
                                <label for="updated_at" class="active">Date Updated</label>\
                                <small class="errorTxt3"></small>\
                            </div>\
                        </div>\
                    </div>'
                );
                if(response.user.profilePic = "null"){
                    console.log('image here');
                    if(item.gender == 'F'){
                        console.log('female');
                            $('#image').append(
                            '<img src="img/svg_female.png" class="z-depth-4 circle materialboxed" height="64" width="64" id="profileImg">'
                            );
                        }else{
                        console.log('male');
                            $('#image').append(
                             '<img src="./img/svg_male.png" alt="" class="z-depth-4 circle materialboxed" height="64" width="64" id="profileImg">'
                            );
                        }

                }else{

                }

                // $('.updatePro').append(
               

                // '<tr>\
                //     <td>First Name</td>\
                //     <td>'+ item.firstname + '</td>\
                //     <td><a class="waves-effect waves-light btn btn-small modal-trigger" id="update1" data-target="updatefName"  data-id="'+ item.firstname + '" >Update</a></td>\
                // </tr>\
                // <tr>\
                //     <td>Last Name</td>\
                //     <td>'+ item.lastname + '</td>\
                //     <td><a class="waves-effect waves-light btn btn-small modal-trigger" data-target="updatelName" data-id="'+ item.id + '">Update</a></td>\
                // </tr>\
                // <tr>\
                //     <td>User Name</td>\
                //     <td>'+ item.username + '</td>\
                //     <td><a class="waves-effect waves-light btn btn-small  modal-trigger" data-target="updateuName" data-id="'+ item.id + '">Update</a></td>\
                // </tr>\
                // <tr>\
                //     <td>Password</td>\
                //     <td>hidden</td>\
                //     <td><a class="waves-effect waves-light btn btn-small modal-trigger" data-target="updatepassword" data-id="'+ item.id + '">Update</a></td>\
                // </tr>'
                // );
                
            });

            
            
        }
    });
}

$('#updateFirs').on('click', function (e) {
    // e.preventDefault();
});

fetchDeliveryAgents();
function fetchDeliveryAgents() {
    $.ajax({
        type: "GET",
        url: "/fetchDeliveryAgents",
        dataType: "json",
        success: function (response) {
            // console.log(response);

            // console.log(response.user);
                 let i = 1;
            $.each(response.user, function (key, item) {
                $('#agentData').append(
                    '<tr>\
                        <td>'+ i++ + '</td>\
                        <td>'+ item.username + '</td>\
                        <td>'+ item.email + '</td>\
                        <td>'+ item.phone + '</td>\
                        <td>'+ item.gender + '</td>\
                        <td>'+ item.userType + '</td>\
                        <td>'+ item.created_at + '</td>\
                        <td><div><img src="img/'+item.profilePic+'" class="responsive-img materialboxed" width="75px"></div></td>\
                        <td>'+ item.email_verified_at + '</td>\
                        </tr>'
                );
            });
             i++;
        }
    });
}

fetchEcommdetails();
function fetchEcommdetails() {
    $.ajax({
        type: "GET",
        url: "/fetch-EcommDetails",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            if(response.companyDetails != ""){
                // console.log('i see u');
                $('.tbody').html("");
                
                
            }else{
                // console.log('not here');
                $('#verifyModal43').modal('open');

                // $('.pauseMe').prop('disabled', true);
                $('.pauseMe').addClass("disabled");
                // $('#pauseMe2').addClass("hide");
                $('#pauseMe2').hide();
                $('#pauseMe3').hide();

                // $('.pauseMe2').addClass("btn-flat btn-small disabled");
                // $('.pauseMe3').addClass("btn-flat btn-small disabled");
                
            }
        }
    });
}



</script>

@endsection