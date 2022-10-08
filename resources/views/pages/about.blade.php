@extends('layouts.app')

@section('content')

<style>
    .about{
        min-height: calc(60vh - 60px);
        background: url('./media/about.jpg')no-repeat center;
        display: flex;
        align-items: center;
        justify-content: center;

    } 
    body{
    background-color: whitesmoke;

    }

</style>

<body>

<header class="about">
      <div class="container">
          <h2 class="white-text">ABOUT US</h2>
          <ul class="pagination">
            <li><a href="index.php">Home</a></li>
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="waves-effect"><a href="#!">About Us</a></li>
        </ul>
      </div>
</header>
    <div class="section-title">
        <h2>Easy Delivery – Best Place for Delivery</h2>
    </div>
    <section class="section section-icons grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card-panel hoverable">
                        <h3>01</h3>
                        <h5>How it works?</h5>
                        <h6>Partnership</h6>
                        <p>Become an Ecommerce Agent</p>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card-panel hoverable">
                        <h3>02</h3>
                        <h5>How it works?</h5>
                        <h6>Partnership</h6>
                        <p>Become an Delivery Agent</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

@endsection
