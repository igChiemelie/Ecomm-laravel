@extends('layouts.app')

@section('content')


<div class="valign-wrapper row delivery-box">
    <div class="card col s10 pull-s1 m6 pull-m6 l4 pull-l4 hoverable">

        <form method="POST" id="deliveryform">
            <div class="card-content">
                <span class="card-title">Delivery Form</span>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">confirmation_number</i>
                        <label for="bvn">BVN Number</label>
                        <input type="number" class="validate" name="bvn" id="bvn" data-length="11"
                            onKeyPress="if(this.value.length==11) return false;" required />
                    </div>
                    <div class="input-field col s12">
                        <a class="btn blue col s12" href="{{ route('login.facebook') }}" name="fbBtn"><i class="fab fa-facebook-f left"></i>CONTIUNE WITH FACEBOOK</a>
                    </div>
                    <div class="input-field col s12">
                        <a class="btn blue col s12" href="{{ route('login.google') }}" name="goBtn"><i class="fab fa-google left"></i>CONTIUNE WITH GOOGLE</a>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn light-blue col s12"><i class="fab fa-twitter left"></i>CONTIUNE WITH TWITTER</button>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn pink col  s12"><i class="fab fa-instagram left"></i>CONTIUNE WITH INSTAGRAM</button>
                    </div>
                    
                </div>
            </div>
            <div class="card-action center-align">
                <button type="submit" id="deBtn" name="deBtn" class="btn teal waves-effect waves-light">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>


@endsection