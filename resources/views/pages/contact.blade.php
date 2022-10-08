@extends('layouts.app')

@section('content')

<style>
    
.contact{
    min-height: calc(60vh - 60px);
    background: url('./media/ecommer.png')no-repeat center;
    display: flex;
    background-size:contain;
} 
.section-contact{
    background: url('./media/map.jpg')no-repeat center; 
    display: flex;
}
.contactInfo{
    width: 80vw;
    height:30vh;
    margin: 0 auto;
    max-width: 1170px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px,1fr));
    grid-column-gap: 1.5rem;
    grid-row-gap: 2rem;
}
.contactCard{
    border-radius: 20px;
}
body{
    /* background:whitesmoke; */
    /* filter:brightness(50%); */

}

</style>
<body>


  <header class="contact">
      <div class="container">
          <!-- <h2 class="grey-text">CONTACT US</h2> -->
          
      </div>
</header>
    <div class="section-title">
        <h2>GET IN TOUCH</h2>
    </div>
    <section class="section section-icons grey lighten-4 center">
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card-panel contactCard hoverable">
                        <i class="material-icons large teal-text">phone</i>
                        <h6 class="center">Easy Delivery</h6>
                        <h6 class="center">PHONE</h6>
                        <p>Fax: 0803 - 080 - 3082</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel contactCard hoverable">
                        <i class="material-icons large teal-text">email</i>
                        <h6 class="center">Easy Delivery</h6>
                        <h6 class="center">EMAIL</h6>
                        <p>buddha@example.com</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel contactCard hoverable">
                        <i class="material-icons large teal-text">send</i>
                        <h6 class="center">Easy Delivery</h6>
                        <h6 class="center">ADDRESS</h6>
                        <p>No: 58 A, East Madison Street,</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-title ">
        <h2>Contact Form</h2>
    </div>
    <section class="section section-contact">
        <div class="container">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <div class="card-panel gray lighten-3 center">
                    <form id="contactForm">
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" class="validate" name="contactName" id="contactName" required />
                                <label for="contactName">Full Name</label>
                            </div>
                            <div class="input-field col s6">
                                <label for="contactEmail">Email</label>
                                <input type="email" class="validate" required name="contactEmail" id="contactEmail" />
                            </div>
                            <div class="input-field col s6">
                                <input type="tel" class="validate" required name="contactNumber" id="contactNumber" data-length="11" onKeyPress="if(this.value.length==11) return false;"/>
                                <label for="contactNumber">Phone Number</label>
                            </div>
                            <div class="input-field col s6">
                                <label for="subject">Subject</label>
                                <input type="text" class="validate" required name="subject" id="subject" />
                            </div>
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="textarea1" class="materialize-textarea" data-length="50"></textarea>
                                <label for="textarea1">Message</label>
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
    </section>

</body>
@endsection
