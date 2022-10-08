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
        <li class="tab0"><a class="active" href="#home"><i class="material-icons prefix left">home</i>Home</a></li>
        <li class="tab1"><a href="#userPro"><i class="material-icons prefix left">account_circle</i>User Profile</a></li>
        <li class="tab2 "><a href="#notification" data-id="1" value="1"  method="POST" name="notifyUpdate" action="/notifyUpdate" class="ajaxNotify"><i class="material-icons prefix left">notifications_active</i>Notification

            <!-- <span class="new badge red">65</span> -->
    
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
            <h3 class="center"><i> Delivery Agent </i></h3>
        </div>

        <div class="" id="successMessage"></div>

        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>ID</th>
                    <th>Pro Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date-Time</th> 
                    <th><i class="material-icons red-text">delete</i></th>
                </tr>
            </thead>

            
            <tbody class="tbody">
               
            </tbody>
        </table>
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

<div id="userPro" class="content" >
    <div class="row">
        <div class="col s12 m5">
            <div class="card">
                <div class="card-image">
                    <img src="" height="250px"> 
                </div>
                <div class="card-content">
                    <span class="card-title">Profile</span>
                    <ul class=""></ul>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="notification" class="content">
    <div class="row">
        <div class="col s12 m5">
            <div class="container">
                <!-- notification -->
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Pro Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date-Time</th> 
                            <th><i class="material-icons red-text">delete</i></th>
                        </tr>
                    </thead>

                    
                    <tbody class="notification">
                    
                    </tbody>
                </table>
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
<div id="verifyModal43" class="modal">
    <div class="modal-content">
        <h6>TO Become An Delivery Agent Click On The Link Below</h6>
        <p>Click on this link to complete your verification <a href="/agentForm" style="text-decoration:underline;">Here?</a></p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
@endsection
@section('script')

<script>
 $(function () {
    fetchNotify();
    
    function fetchNotify() {
        $.ajax({
            type: "GET",
            url: "/fetch-AgentNotify",
            processData: false,
            contentType: false,
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
                                <td><div><img src="img/'+item.image_path+'" class="responsive-img materialboxed" width="75px"></div></td>\
                                <td>'+ item.contactName + '</td>\
                                <td>'+ item.contactEmail + '</td>\
                                <td>'+ item.contactNumber + '</td>\
                                <td>'+ item.subject + '</td>\
                                <td>'+ item.updated_at + '</td>\
                                <td><a href="#" class="delProductModal red-text delProduct pauseMe3"  modal-trigger data-id="'+ item.id + '"><i class="material-icons">delete</i></a></td>\
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

    notification();
    
    function notification() {
        $.ajax({
            type: "GET",
            url: "/notification",
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                console.log(response.notification);
                if(response.notification != ""){
                    console.log(response.notification.length);
                    $('.notification').html("");
                    let i = 1
                 // i < 0 
                    $('.tab2 a').append('<span class="new badge red">'+ response.notification.length +'</span>');
                    $.each(response.notification, function (key, item) {
                        console.log('emelieChi nwa igna');
                        $('.notification').append(
                            '<tr>\
                                <td>'+ i++ + '</td>\
                                <td>'+ item.productName + '</td>\
                                <td>'+ item.productPrice + '</td>\
                                <td><div><img src="img/'+item.image_path+'" class="responsive-img materialboxed" width="75px"></div></td>\
                                <td>'+ item.contactName + '</td>\
                                <td>'+ item.contactEmail + '</td>\
                                <td>'+ item.contactNumber + '</td>\
                                <td>'+ item.subject + '</td>\
                                <td>'+ item.updated_at + '</td>\
                                <td><a href="#" class="delProductModal red-text delProduct pauseMe3"  modal-trigger data-id="'+ item.id + '"><i class="material-icons">delete</i></a></td>\
                            </tr>'
                        );

                    });
                    i++;
                }
                else{
                    console.log('not here');
                    
                    $('.notification').append(
                        '<tr>\
                            <td colspan="4" class="center-align"><i>'+ response.message+'.</i><td>\
                        </tr>'
                    );
                }
            }
        });
    }

    $('.ajaxNotify').on('click', function (e) {
            e.preventDefault();
            console.log('maama');
            let views = $(this).attr('data-id');
            // let views = $(this).val();
            console.log(views);
            let url = $(this).attr('action');
            let mtd = $(this).attr('method');
            console.log(mtd);
            console.log(url);



            let formData = new FormData();
            formData.append('views', views);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: mtd,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                dataType:'json',
                success: function (response) {
                    console.log(response);
                    $(".badge").addClass("hide");
                    // alert('emelie');
                }
            });
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
            url: "/deleteAgentNotify/" + productId,
            success: function (response) {
                // console.log(response);
                $('#successMessage').html("");
                $('#successMessage').text(response.message);
                $('#successMessage').addClass("green white-text");
                $('#deleteProductModal').modal('close');
                fetchNotify();

            }
        })
    });


});


//  fetchAgentDetails();
//     function fetchAgentDetails() {
//         $.ajax({
//             type: "GET",
//             url: "/fetch-AgentDetails",
//             dataType: "json",
//             success: function (response) {
//                 console.log(response);
//                 if(response.companyDetails != ""){
//                     console.log('i see u');
                   
                    
//                 }else{
//                     console.log('not here');
//                     $('#verifyModal43').modal('open');

//                     // $('.pauseMe').prop('disabled', true);
//                     $('.pauseMe').addClass("disabled");
//                     $('.pauseMe2').addClass("btn-flat btn-small disabled");
//                     $('.pauseMe3').addClass("btn-flat btn-small disabled");
                    
//                 }
//             }
//         });
//     }


</script>

@endsection
