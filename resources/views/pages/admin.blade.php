@extends('layouts.app')

@section('content')

{{-- <link href="{{asset('css/page-users.min.css')}}" rel="stylesheet"> --}}
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
        <li class="tab0"><a class="active" href="#home"><i class="material-icons prefix left">home</i>Home</a></li>
        <li class="tab1"><a href="#userPro"><i class="material-icons prefix left">account_circle</i>User Profile</a></li>
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
    <div class="container card z-depth-4">
        <div class="card-content" style="padding-left: 24px; padding-right: 24px; padding-top: 0px; padding-bottom: 0px;">
            <h2>All Products</h2>
            <div class="" id="successMessage"></div>
            <a class="btn-floating btn-large waves-effect waves-light teal right modal-trigger pulse" href="#productModal"><i class="material-icons">add</i></a>
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
                    <th>Viewed</th> 
                    <th>Modified</th> 
                    <th><i class="material-icons blue-text">edit</i></th>
                    <th><i class="material-icons red-text">delete</i></th>
                </tr>
            </thead>

            
            <tbody class="tbody">
            
            </tbody>

            <ul class="pagination ">
            </ul>

        </table>
        
                    
    </div>


        
</div>

<div id="productModal" class="modal">
    <div class="modal-content">
        <h3>PRODUCT</h3>        
        
        <ul id="saveErr"></ul>

        <div class="row">
            
            <form method="POST"  id="proForm" enctype="multipart/form-data">
                @csrf
                <div class="input-field col s6">
                    <input type="text" id="productName" name="productName" class="validate productName" placeholder="Product Name" >
                    <label for="productName">Product Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="text"  name="productPrice" class="validate productPrice" placeholder="Product Price">
                    <label for="productPrice">Product Price</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn-small">
                        <span>Product</span>
                        <input type="file" name="image_path" id="image_path" class="image_path" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="productDetail" name="productDetail" class="validate productDetail"
                        placeholder="Product Description" >
                    <label for="proDetails">Product Description</label>
                </div>
                <div class="modal-footer">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right addProduct" type="submit"  name="productBtn"
                            id="productBtn" >Create
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
            <form method="POST" action="/pages" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('PUT')
                <div class="input-field col s12">
                    <input type="text" id="editProductId">
                
                </div>
                <div class="input-field col s6">
                    <input type="text" id="editProductName" name="productName" class="val"
                        placeholder="Product Name">
                    <label for="productName">Product Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="editProductPrice" name="productPrice" 
                        class="val2" placeholder="Product Price">
                    <label for="productPrice">Product Price</label>
                </div>
                <div class="file-field input-field col s12">
                    <div class="btn-small">
                        <span>Product</span>
                        <input type="file" name="image_path" id="image_path" class="image_path" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="editProductDetail" name="productDetail" 
                        class="val3" placeholder="Product Description">
                    <label for="proDetails">Product Description</label>
                </div>
                <div class="modal-footer">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right" type="submit" 
                            id="updateProduct">Edit
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

<div id="userPro" class="content">
    <div class="row">
        <!-- <div class="col s12 m5">
            <div class="card">
                <div class="card-image">
                    <img src="" height="250px"> 
                </div>
                <div class="card-content">
                    <span class="card-title">Profile</span>
                    <ul class=""></ul>
                </div>
            </div>
        </div> -->
        <div class="col s12">
            <div class="container">
                <!-- users edit start -->
                <div class="section users-edit">
                    <div class="card">
                        <div class="card-content">
                            <!-- <div class="card-body"> -->
                            <ul class="tabs mb-2 row">
                                <li class="tab">
                                    <a class="display-flex align-items-center active" id="account-tab" href="#account">
                                        <i class="material-icons mr-1" style="vertical-align: middle">person_outline</i><span>Account Info</span>
                                    </a>
                                </li>
                               
                                <li class="indicator" style="left: 0px; right: 530px;"></li>
                            </ul>
                            <div class="divider mb-3"></div>
                            <div class="row">
                                <div class="col s12 active" id="account" style="display: block;">
                                    <!-- users edit media object start -->
                                    <div class="media display-flex align-items-center mb-2">
                                        <a class="mr-2" href="#">
                                            <img src="img/svg_male.png"
                                                alt="users avatar" class="z-depth-4 circle" height="64" width="64">
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
                                        <div class="row">
                                            <div class="col s12 m6">
                                                <div class="row">
                                                    <div class="col s12 input-field">
                                                        <input id="username" name="username" type="text"
                                                            class="validate" value="dean3004" data-error=".errorTxt1">
                                                        <label for="username" class="active">Username</label>
                                                        <small class="errorTxt1"></small>
                                                    </div>
                                                    <div class="col s12 input-field">
                                                        <input id="name" name="name" type="text" class="validate"
                                                            value="Dean Stanley" data-error=".errorTxt2">
                                                        <label for="name" class="active">Name</label>
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                    <div class="col s12 input-field">
                                                        <input id="email" name="email" type="email" class="validate"
                                                            value="deanstanley@gmail.com" data-error=".errorTxt3">
                                                        <label for="email" class="active">E-mail</label>
                                                        <small class="errorTxt3"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m6">
                                                <div class="row">
                                                    <div class="col s12 input-field">
                                                        <input id="username" name="username" type="text"
                                                            class="validate" value="dean3004" data-error=".errorTxt1">
                                                        <label for="username" class="active">Username</label>
                                                        <small class="errorTxt1"></small>
                                                    </div>
                                                    <div class="col s12 input-field">
                                                        <input id="name" name="name" type="text" class="validate"
                                                            value="Dean Stanley" data-error=".errorTxt2">
                                                        <label for="name" class="active">Name</label>
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                    <div class="col s12 input-field">
                                                        <input id="email" name="email" type="email" class="validate"
                                                            value="deanstanley@gmail.com" data-error=".errorTxt3">
                                                        <label for="email" class="active">E-mail</label>
                                                        <small class="errorTxt3"></small>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                          
                                            <div class="col s12 display-flex justify-content-end mt-3">
                                                <button type="submit" class="btn indigo">
                                                    Save changes</button>
                                                <button type="button" class="btn btn-light">Cancel</button>
                                            </div>
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

<div id="notification" class="content" >
    <div class="row">
        <div class="col s12 m5">
            <div class="card">
                notification
            </div>
        </div>
    </div>  
</div>

<div id="deliveryAgent" class="content" >
    <div class="row">
        <div class="col s12 m5">
            <div class="card">
                deliveryAgent
            </div>
        </div>
    </div>  
</div>
<div id="setting" class="content" >
    <div class="row">
        <div class="col s12 m5">
            <div class="card">
                setting
            </div>
        </div>
    </div>  
</div>
  
@endsection
@section('script')


<script>
 $(function () {
    fetchProduct();
    function fetchProduct(page) {
        $.ajax({
            type: "GET",
            // url: "/fetch-Product",
            url:"/pages/fetch_data?page="+page,
            dataType: "json",
            success: function (response) {
                console.log(response.product);
                console.log(response.product.data);
                console.log(response.product.next_page_url);
                if(response.product != ""){
                    console.log('onye mgu');
                    $('tbody').html("");
                    let i = 1
                 // i < 0 
                    $.each(response.product.data, function (key, item) {
                        $('tbody').append(
                            '<tr>\
                                <td>'+ i++ + '</td>\
                                <td>'+ item.id + '</td>\
                                <td>'+ item.productName + '</td>\
                                <td>'+ item.productPrice + '</td>\
                                <td>'+ item.productDetail + '</td>\
                                <td><div><img src="img/'+item.image_path+'" class="responsive-img materialboxed" width="75px"></div></td>\
                                <td>'+ item.username + '</td>\
                                <td>'+ item.views + '</td>\
                                <td>'+ item.updated_at + '</td>\
                                <td><a href="#" class="editProductModal editProduct blue-text" modal-trigger data-id="'+ item.id + '"><i class="material-icons">edit</i></a></td>\
                                <td><a href="#" class="delProductModal red-text delProduct" modal-trigger data-id="'+ item.id + '"><i class="material-icons">delete</i></a></td>\
                            </tr>'
                        );

                    });   
                    i++;
                    
                }else{
                    console.log("not hreer");
                    
                    $('tbody').append(
                        '<tr>\
                            <td colspan="4" class="center-align"><i>'+ response.message+'.</i><td>\
                        </tr>'
                    );
                }

                $('.pagination').html(
                    '<li class=" pagin"><a href="'+response.product.prev_page_url+'"><i class="material-icons">chevron_left</i></a></li>\
                    <li class="active pagin"><a href="'+response.product.current_page+'">'+response.product.current_page+'</a></li>\
                    <li class="waves-effect pagin"><a href="'+response.product.next_page_url+'"><i class="material-icons">chevron_right</i></a></li>'
            
                );
               
            }
        });
    }

    $(document).on('click', '.pagin a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        // fetch_data(page);
        fetchProduct(page)
    });

    function fetch_data(page){
        $.ajax({
            // url:"/pages/fetch-Product?page="+page,
            url:"/pages/fetch_data?page="+page,
            success:function (data) {
                console.log(data);
                $('.tbody').html(data);
            }
        });
    }

    $(document).on('submit', '#proForm', function (e) {
        e.preventDefault();
        // var data = {
        //     'productName': $('.productName').val(),
        //     'productPrice': $('.productPrice').val(),
        //     'productDetail': $('.productDetail').val(),
        //     // 'image_path': $('.image_path').val(),
        //     'image_path': $('input[name="image_path"]')[0].files[0]
        //     // processData: false,
        //     // contentType: false,
        // }
        // let productName = $('.productName').val();
        // let productPrice = $('.productPrice').val();
        // let productDetail = $('.productDetail').val();
        // let image_path = $('input[name="image_path"]')[0].files[0];

        //     console.log(productPrice);
        //     console.log(productName);
        //     console.log(productDetail);
        //     console.log(image_path);

        // var formData = new FormData();

        // formData.append('productName', productName);
        // formData.append('productPrice', productPrice);
        // formData.append('productDetail', productDetail);
        // formData.append('image_path', image_path);
        // console.log(formData);
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
                console.log(response);
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
            url: "/editProduct/" + productId,
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

        // $(this).html("");
        // $(this).text('Updating....!!!');

        var productId = $('#editProductId').val();
        // var data = {
        //     'productName': $('#editProductName').val(),
        //     'productPrice': $('#editProductPrice').val(),
        //     'productDetail': $('#editProductDetail').val(),
        // }
        
        let EditformData = new FormData($('#editForm')[0]); 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/updateProduct/"+productId,
            data: EditformData,
            cache:false,
            processData: false,
            contentType: false,
            success: function (response) {
                // console.log(response);

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

                } else {
                    $('#saveErr2').html("");
                    $('#successMessage').html("");
                    $('#successMessage').text(response.message);
                    $('#successMessage').addClass("green white-text");
                    $('#editModal').modal('close');
                    // $('#updateProduct').html('');
                    // $('#updateProduct').text('Updated.');
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
            url: "/deleteProduct/" + productId,
            dataType:"json",
            success: function (response) {
                console.log(response);
                $('#successMessage').html("");
                $('#successMessage').text(response.message);
                $('#successMessage').addClass("green white-text");
                $('#deleteProductModal').modal('close');
                fetchProduct();

            }
        })
    });


});

// fetchProfile();
// function fetchProfile() {
//     $.ajax({
//         type: "GET",
//         url: "/fetch-Profile",
//         dataType: "json",
//         success: function (response) {
//             // console.log(response.user);

//             $.each(response.user, function (key, item) {
//                 $('.profileDetails').append(
//                     '<li>Name: ' + item.username + '</li>\
//                     <li>First Name: '+ item.firstname + '</li>\
//                     <li>Last Name Name: '+ item.lastname + '</li>\
//                     <li>Email: '+ item.email + '</li>\
//                     <li>UserType: '+ item.userType + '</li>\
//                     <li>Gender: '+ item.gender + '</li>\
//                     <li>Date Created: '+ item.created_at + '</li>\
//                     <li>Updated: '+ item.updated_at + '</li>'
//                 );

//             });
            
//         }
//     });
// }
</script>
@endsection
