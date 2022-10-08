@extends('layouts.app')

@section('content')

<style>
    .ecommerce-box{
        height: 80vh; 
        overflow-x: hidden;
        position: relative;
        top:1rem;
    }
</style>



<div class="valign-wrapper row ">
    <div class="card ecommerce-box col s10 pull-s1 m6 pull-m6 l4 pull-l4 hoverable">
        <ul id="saveErr"></ul>
        <form method="POST" action="/ecomm" id="ecommerceForm" enctype="multipart/form-data">
        @csrf
        <!-- <input type="hidden" class="validate" name="userId" id="userId"/> -->
            <div class="card-content">
                <span class="card-title">E-Commerce</span>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="validate" name="companyName" />
                    </div>
                    <div class="input-field col s12">
                        <label for="companyAddress">Company Address</label>
                        <input type="text" class="validate" name="companyAddress"  />
                    </div>
                    <div class="input-field col s12">
                        <label for="companyRcNumber">Company Rc Number</label>
                        <input type="text" class="validate"  name="companyRcNumber" />
                    </div>
                    <div class="input-field col s12">
                        <label for="companyMobileNum">Company Phone Number</label>
                        <input type="tel" class="validate" name="companyMobileNum"  />
                    </div>
                    <!-- <div class="input-field col s12">
                        <label for="companySignature">Company Signature</label>
                        <input type="text" class="validate" placeholder="(optional)" name="companySignature" />
                    </div>
                    <div class="file-field input-field col s12">
                        <div class="btn-small">
                            <span>Choose Company Logo</span>
                            <input type="file" name="companyLogo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="(optional)">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="card-action center-align">
                <button type="submit" id="ecomBtn" name="ecomBtn" class="btn teal waves-effect waves-light">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).on('submit', '#ecommerceForm', function (e) {
        e.preventDefault();
        console.log('yes');

        let formData = new FormData($('#ecommerceForm')[0]);
        // console.log(formData);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/ecomm",
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
                    // $('#saveErr').html("");
                    // $('#successMessage').addClass("green white-text");
                    // $('#successMessage').text(response.message);
                    alert(response.message);
                    // $('#productModal').modal('close');
                    // $('#productModal').find('input').val("");
                    // setTimeout(() => {
                        window.location.href = "/ecomm";
                    // }, 3000);
                }
            }
        });
    });
</script>

@endsection
