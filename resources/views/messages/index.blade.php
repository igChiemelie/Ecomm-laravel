<div class="message-wrapper">
    <ul class="messages">
        <!-- {{$messages}} -->
        @foreach($messages as $message)
        <li class="messages blockquote clearfix">
            <div class="{{($message->from == Auth::id()) ? 'sent': 'recieved'}}">
                <p class="">{{$message->message}}</p>
                <p class="date">{{date('d M y, h:i a', strtotime($message->created_at))}}</p>
            </div>
        </li>
        @endforeach
        <!-- <li class="messages blockquote clearfix">
            <div class="recieved">
                <p class="">lorem inmnf fdfid</p>
                <p class="date">1 sep, 2021</p>
            </div>
        </li> -->

    </ul>
  
    <a href="#!" class="sendMessage" data-id="true">    
        <span style="position: absolute;bottom: 85px;right: 100px;cursor: pointer;">
        <i class="material-icons" >send</i>
        <i class="material-icons link" >link</i>
        </span>
    </a>
   
    <!-- <div class="file-field" style="z-index: 999;position: absolute; bottom: 8rem;">
        <div class="btn-small">
            <span>Img/mp3/mp4</span>
            <input type="file" name="image_path" id="image_path" class="image_path" >
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
            <button style="margin-top: -3.5rem;margin-left: 355px;" class="submit btn" type="submit"><span id="sendFile"><i class="material-icons" >send</i></span></button>
        </div>
    </div> -->
</div>

<!-- 
<div class="input-field">
    <textarea class="materialize-textarea" id="artPosts"  name="messages" class="validate" required></textarea>
    <label for="artPosts">write Post</label>
<button class="submit" type="submit"> send</button>
 
</div> -->

<div class="">
    <input type="text" name="messages" class="submit" id=""  style="border:2px dotted  grey;border-radius: 5px;">
</div>
