<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/material-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../public/css/materialize.css"> -->
    <!-- <link rel="stylesheet" href="../public/fonts/material-icons.css"> -->
    <link rel="icon" href="{{ asset('img/logo7_16_164140.jpeg')}}" class="circle" type="img/logo7_16_164140.jpeg">
    <style>
        span.field-icon {
            float: right;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            z-index: 2;
        }
        .lRBox{
            margin: 2rem auto;
        }
</style>

</head>
<body>
    <div id="app" >
        <div class="navbar-fixed">
            <nav>
                
                <div class="nav-wrapper nav teal lighten-2">
                    <a class="brand-logo" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        

                        @if(Auth::check() && Auth::user()->userType == 'Admin')
                            <li><a href="/pages">Dashboard</a></li>

                    
                        @elseif(Auth::check() && Auth::user()->userType == 'E_CommerceAgent')
                            
                            <li><a href="/ecomm">Dashboard Panel</a></li>
                            

                        @elseif(Auth::check() && Auth::user()->userType == 'DeliveryAgent')
                            <li><a href="/agent">Dashboard</a></li>
                            <li>
                                <a href="http://">
                                    <img src="{{Auth::user()->avatar}}" class="red" srcset="" style="border:1px solid #cccccc; border-radius:5px; width:39px; height:auto; float:left; margin-right:7px;">
                                </a>    
                            </li>
                            
                        @else
                         
                          <li><a href="/about">About</a></li>
                          <li><a href="/contact">Contact Us</a></li>

                        @endif

                        <!-- <li><a href="/pages">Products</a></li> -->

                        @guest
                                <li class="">
                                    <a class="" href="{{ route('login') }}">Account</a>
                                    <!-- <a class="" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                </li>
                                <!-- @if (Route::has('register'))
                                    <li class="">
                                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif -->
                            @else

                            <li class="">
                                    <a id="navbarDropdown" class="dropdown-trigger" data-target="userProfile" href="#">
                                        {{ Auth::user()->username }}<i class="material-icons left">arrow_drop_down</i>
                                        @if(Auth::user()->email_verified_at != "")
                                            <i class="material-icons yellow-text right">verified_user</i>
                                        @else
                                            <i class="fas fa-user-slash yellow-text right"></i>
                                        @endif

                                    </a>

                                    <div>
                                        <ul id="userProfile" class="dropdown-content">
                                            <li>
                                                <!-- <a href="{{ route('logout') }}">{{ __('Logout') }}</a> -->
                                                <a  href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </li>    
                                        </ul>

                                        <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none">
                                            @csrf_field
                                        </form> -->
                                    </div>
                                </li>
                            @endguest
                    </ul>
                    
                </div>
                
            </nav>
            
        </div>
        <ul class="sidenav" id="mobile-demo">
             @guest
                <li class="">
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="">
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else

            <li class="">
                    <a id="navbarDropdown" class="dropdown-trigger" data-target="userProfile1" href="#">
                        {{ Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i>
                        @if(Auth::user()->email_verified_at != "")
                            <i class="material-icons yellow-text left">verified_user</i>
                        @else
                            <i class="fas fa-user-slash yellow-text left"></i>
                        @endif
                    </a>

                    <div>
                        <ul id="userProfile1" class="dropdown-content">
                            <li>
                                <!-- <a href="{{ route('logout') }}">{{ __('Logout') }}</a> -->
                                <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>    
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
            @endguest
        </ul>
        
        <div class="hide">
            <ul class="collapsible" style="margin-top: 0.4px;border-left:0;border-right:0;">
                <li>
                    <div class="collapsible-header red"><i class="material-icons">filter_drama</i>First</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>

        <main class="py-4">
            @yield('content')
        </main>


        <footer class="page-footer teal" id="">
        <div class="footer-copyright">
            <div class="container black-text" style="width:80%;">
                Easy Delivery &copy; 2021-<?php $today = date("Y"); echo "$today"; ?>
                <div class="right black-text">
                    <ul >
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
        
    </div>


    <script src="{{ asset('js/pusher.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>  
    <script src="{{asset('js/clock.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('js/jbs.js') }}"></script>
    <!-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->
    <script>
        var receiver_id = "";
        var my_id = "{{Auth::id()}}";
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('4596f1ec13d9d64233b2', {
                cluster: 'ap2'
                // forceTLS:true
            });

            var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));
                if(my_id == data.from){
                    // alert('sender');
                     $('#' + data.to).click();
                }else if(my_id == data.to){
                    if(receiver_id == data.from){
                        //if reciever is selected, reload the selected user...
                        $('#' + data.from).click();
                    }else{
                        //if receiver is not selected, add notification for thta user
                        var pending = parseInt($('#' + data.from).find('.pending').html());

                        if(pending){
                            $('#' + data.from).find('.pending').html(pending + 1); 
                        }else{
                            $('#' + data.from).append('<span class="pending">1</span>');
                        }
                    }
                    
                }
            });

            $('.user').on('click', function name(params) {
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();
                

                receiver_id = $(this).attr('id');
                // alert(receiver_id);
                $.ajax({
                    type:"get",
                    url:"message/"+ receiver_id,  //created in ***ROUTE
                    data:"",
                    cache:false,
                    success:function (data) {
                        // alert(data);
                        $('#messages').html(data);
                        scrollToButtonFunc();
                    }
                })
            });

            // $(document).on('click', '.link', function () {
            //    console.log('link'); 
            //     $('.link').append(
            //         '<div class="file-field input-field col s12">\
            //             <div class="btn-small">\
            //                 <span>img/mp3/mp4</span>\
            //                 <input type="file" name="filePath" id="file" class="file">\
            //             </div>\
            //             <div class="file-path-wrapper">\
            //                 <input class="file-path validate" type="text">\
            //             </div>\
            //         </div>'
            //    );
            // });

            $(document).on('keyup','input',function (e) {
            //    console.log('keyup'); 
               var message = $(this).val();

                // var clicked  = $('.sendMessage').attr('data-id');
                // var clicked2  = $('#sendFile').val();
                // console.log(clicked);
                // console.log(clicked2);
                // console.log(message);

                // e.keyCode == 13
                //check if enter key is pressed and message is not null also receiver_id is selected
                if (e.keyCode == 13 && message != "" && receiver_id != "") {
                    // alert(message);
                    $(this).val("");  //When pressed Enter key text box will be empty;
                    var datastr = "receiver_id="+ receiver_id + "&message=" + message;
                    $.ajax({
                        type:"POST",
                        url:"message", //create in ***Web Route
                        data:datastr,
                        cache:false,
                        success:function (data) {
                            console.log(data);
                        },
                        error:function (status,err) {
                            
                        },
                        complete:function () {
                            scrollToButtonFunc();
                        }
                    });
                }
                
            });


            function scrollToButtonFunc() {
                $('.message-wrapper').animate({
                    scrollTop:$('.message-wrapper').get(0).scrollHeight
                }, 50);
            }
            
        });
    </script>
    @yield('script');
</body>
</html>
