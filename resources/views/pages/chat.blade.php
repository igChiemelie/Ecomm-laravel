@extends('layouts.chatApp')

@section('content')
<style>
    ul{
        margin:0;
        padding:0;
    }
    .user-wrapper, .message-wrapper{
        border:1px solid #dddddd;
        overflow-y:auto;
    }
    .user-wrapper{
        height:500px;
    }
    .user{
        cursor:pointer;
        padding:5px 0;
        position:relative;
    }
    .user:hover{
        background:#eeeeee;
    }
    .user:last-child:{
        margin-bottom:0;
    }
    .pending{
    position: relative;
    left: 30px;
    /* top: auto; */
    bottom: 2.67rem;
    background: #b600ff;
    margin: 0;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    line-height: 18px;
    padding-left: 5px;
    color: #ffffff;
    font-size:12px;
    }
    .media{
        display: inline-flex
    }
    .media-left{
        margin: 0 10px;
    }
    .media-left img{
        width:64px; 
        border-radius:50%;
    }
    .media-body p {
        margin:6px 0;
    }
    .message-wrapper{
        padding:10px;
        height:536px;
        background:#eeeeee;
    }
    .messages .message{
        margin-bottom:15px;
    }
    .messages .message:last-child{
        margin-bottom:0;
    }
    .recieved, .sent{
        width:45%;
        padding:3px 10px;
        border-radius:10px;
    }
    .recieved{
        background:#ffffff;
    }
    .sent{
        background:#3bebff;
        float:right;
        text-align:right;
    }
    .message p{
        margin:5px 0;
    }
    .date{
        color:#777777;
        font-size:12px;
    }
    .active{
        background:#eeeeee;
    }
    input[type=text]{
        width:100%;
        padding:12px 20px;
        margin:15px 0 0 0;
        display:inline-flex;
        border-radius: 4px;
        outline:none;
        border:1px solid #cccccc;
    }
    input[type=text]:focus{
        border:1px solid #aaaaaa;
    }
</style>
    <div class="container" style="width:85%;">
        <div class="row">
            <div class="col s4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                        <li class="user"  id="{{$user->id}}">
                            @if($user->unread)
                                <span class="pending">{{$user->unread}}</span>
                            @endif
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('img/demo.jpg') }}" alt="" width="100%" srcset="" class="media-object responsive-img">
                                    <!-- <img src="{{ asset('img/$user->avatar') }}" alt="" width="100%" srcset="" class="media-object responsive-img"> -->
                                </div>
                                <div class="media-body">
                                    <p class="name">{{$user->username}}</p>
                                    <p class="email">{{$user->email}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <!-- <li class="user">
                            <span class="pending">1</span>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('img/demo.jpg') }}" alt="" width="100%" srcset="" class="media-object responsive-img">
                                </div>
                                <div class="media-body">
                                    <p class="name">John Doe</p>
                                    <p class="email">john@gmail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="user">
                            <span class="pending">1</span>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('img/demo.jpg') }}" alt="" width="100%" srcset="" class="media-object responsive-img">
                                </div>
                                <div class="media-body">
                                    <p class="name">John Doe</p>
                                    <p class="email">john@gmail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="user">
                            <span class="pending">1</span>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('img/demo.jpg') }}" alt="" width="100%" srcset="" class="media-object responsive-img">
                                </div>
                                <div class="media-body">
                                    <p class="name">John Doe</p>
                                    <p class="email">john@gmail.com</p>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>

            <div class="col s8" id="messages">
                
            </div>

        </div>
        
    </div>
    
@endsection
@section('script')

@endsection

