M.AutoInit();
console.log('hrewwq');
$('input#password, input#password').characterCounter();
$('input#passwords, input#passwords2').characterCounter();

var clicked = 0;

$(".toggle-password").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("toggle-password");
    if (clicked == 0) {
        $(this).html('<span class="material-icons">visibility_off</span >');
        clicked = 1;
    } else {
        $(this).html('<span class="material-icons">visibility</span >');
        clicked = 0;
    }

    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
    var input = $("#passwords").attr('type');
});

$(".dropdown-trigger").dropdown({
    coverTrigger: false
});

$('.banner-title').hide().fadeIn(5000);
setInterval(function () {
    $('.banner-title').fadeOut(2000);
}, 2000);
setInterval(function () {
    $('.banner-title').fadeIn(2000);
}, 2000);

$('input[name="productDetail"]').on('keyup', function (e) {
    e.preventDefault();
    if (productName, productDetail) {
        $('#productBtn').prop('disabled', false);
    } else {
        $('#productBtn').prop('disabled', true);
    }
});




$('#home').show();
$('#userPro').hide();
$('#notification').hide();
$('#deliveryAgent').hide();
$('#setting').hide();

$('.tab0').on('click', () => {
    $('#home').show();
    $('#userPro').hide();
    $('#notification').hide();
    $('#deliveryAgent').hide();
    $('#setting').hide();
});
$('.tab1').on('click', () => {
    $('#home').hide();
    $('#userPro').show();
    $('#notification').hide();
    $('#deliveryAgent').hide();
    $('#setting').hide();
});
$('.tab2').on('click', () => {
    $('#home').hide();
    $('#userPro').hide();
    $('#notification').show();
    $('#deliveryAgent').hide();
    $('#setting').hide();
});
$('.tab3').on('click', () => {
    $('#home').hide();
    $('#userPro').hide();
    $('#notification').hide();
    $('#deliveryAgent').show();
    $('#setting').hide();
});
$('.tab4').on('click', () => {
    $('#home').hide();
    $('#userPro').hide();
    $('#notification').hide();
    $('#deliveryAgent').hide();
    $('#setting').show();
});

// let editproductname = $(this).attr('data-name');
//     let details = $(this).attr('data-details');
    // let mm = $('input[name = "productName"]').append(editproductId);
//     let productname = $('.val').attr('value', editproductname);


$("#verifyModal43").modal({
    dismissible: false
});

$("#modalShadow").modal({
    dismissible: false
});

// $('#verifyModal43')(function () {
// });