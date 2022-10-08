customerItemArr = [];
product = [];
buttonsDOM = [];
const cartContent = document.querySelector(".cart-content");
const carttotal = document.querySelector(".totalCost");
const cartData = $('.cartData');

$(function () {

    function setupApp() {
        customerItemArr = getCart();
        // itemsTotal = storage.getCart1();
        // this.setCartValues(customerItemArr);
        // this.populateCart(customerItemArr);
        console.log('customerItemArr');
        // console.log(customerItemArr);
        if (customerItemArr) {
            // console.log(cart);
            //    console.log('cart');
            // customerItemArr.push(cart)

            // cart == customerItemArr;
            // console.log(cart);
            // console.log(customerItemArr);
            let cartNo = customerItemArr.length;
            console.log(cartNo);

            let resultTotal = $('.cart-items').text(cartNo);
            populateCart();
            

        } else {
            console.log('not here');
        }
        
    }
    setupApp();

    function showCart() {

        if (customerItemArr.length > 0) {
            $('.modalShadow').modal('open');

        } else {
            alert('Please add a product to cart before proceeding to checkout');
        }

        // checkOut.addEventListener("click", () => {
        //     console.log('i see u');
        //     payWithPaystack();

        // });
    }


    function populateCart() {

        // cart.forEach(item => this.addCartItem(item));
        console.log(customerItemArr);
        // var totalCost = 0;
        customerItemArr.forEach(function (item, index) {
            var sn = index + 1;
            var tableRowContent = '<tr id="' + item[3] + '" class="cartData">\
                                                <td>' + sn + '</td>\
                                                <td>' + item[0] + '</td>\
                                                <td>$' + item[2] + '</td>\
                                                <td>' + item[3] + '</td>\
                                                <td>\
                                                    <div class="item-icons">\
                                                        <i class="material-icons up" data-id="'+ item[3] + '">arrow_drop_up</i >\
                                                            <p class="item-amount">'+ item[4] +'</p>\
                                                        <i class="material-icons down" data-id="'+ item[3] + '">arrow_drop_down</i>\
                                                    </div >\
                                                </td>\
                                                <td><a href="#!" class="red-text deleteProduct" id="pau" data-id="'+ item[3] + '"><i class="material-icons">delete</i></a></td>\
                                            </tr>';

            $('.modalShadow table').append(tableRowContent);
            // totalCost += parseInt(item[2]);
            totalPrice();
            // console.log(totalCost);
            //pasrse init add up number e.g addition

        });
        $('.modalShadow table').append('<tr class="totalCostParent"><th>TOTAL</th><th></th><th class="totalCost"></th></tr>');
        $('.totalCost').text(totalPrice());
        deleteProduct();
        increaseQuantity();
        decreaseQuantity();
        cartButton();
    }

    function populateCart2() {

        // cart.forEach(item => this.addCartItem(item));
        console.log(customerItemArr);
        // var totalCost = 0;
        let lastIndex = customerItemArr;
        // return customerItemArr;

        console.log(lastIndex);

        // if (customerItemArr[customerItemArr.length - 1]) {
        //     return customerItemArr;
        // }
        $('.modalShadow table tbody').empty();
        lastIndex.forEach(function (item, index) {
            var sn = index + 1;
            var tableRowContent2 = '<tr id="' + item[3] + '" class="cartData">\
                                                <td>' + sn + '</td>\
                                                <td>' + item[0] + '</td>\
                                                <td>$' + item[2] + '</td>\
                                                <td>' + item[3] + '</td>\
                                                <td>\
                                                    <div class="item-icons">\
                                                        <i class="material-icons up" data-id="'+ item[3] + '">arrow_drop_up</i >\
                                                            <p class="item-amount">'+ item[4] +'</p>\
                                                        <i class="material-icons down" data-id="'+ item[3] + '">arrow_drop_down</i>\
                                                    </div >\
                                                </td>\
                                                <td><a href="#!" class="red-text deleteProduct" id="pau" data-id="'+ item[3] + '"><i class="material-icons">delete</i></a></td>\
                                            </tr>';

            $('.modalShadow table').append(tableRowContent2);
            // $('table').append(tableRowContent2);
            // totalCost += parseInt(item[2]);
            totalPrice();
            // console.log(totalCost);
            //pasrse init add up number e.g addition

        });
        $('.modalShadow table').append('<tr class="totalCostParent"><th>TOTAL</th><th></th><th class="totalCost">$</th></tr>');
        $('.totalCost').text(totalPrice());
        deleteProduct();
        increaseQuantity();
        decreaseQuantity();
        cartButton();
    }

    $('.view-btn').on('click', function (e) {
        e.preventDefault();
        let views = $(this).attr('data-id');
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
            // dataType:'json',
            // success: function (response) {
            //     console.log(response);
            // }
        });
    });


    $('.addToCart').click(function (e) {
        console.log('selected');
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();

        var thisPrdtName = $(this).attr('data-name');
        var thisPrdtImg = $(this).attr('data-img');
        var thisPrdtPrice = $(this).attr('data-price');
        var thisPrdtAmount = $(this).attr('data-id');
        // var thisPrdtQuantity = $(this).attr('data-quantity');
        let tempArr = [];
        pushItemToArray(thisPrdtName, tempArr);
        pushItemToArray(thisPrdtImg, tempArr);
        pushItemToArray(thisPrdtPrice, tempArr);
        pushItemToArray(thisPrdtAmount, tempArr);
        pushItemToArray(1, tempArr);

        pushItemToArray(tempArr, customerItemArr);
        // $(this).removeClass('addToCart').text('Added').prop('disabled', true);
        // $(this).on('click', function (e) {
            // e.preventDefault();
            // console.log('es8');
            // let productId = $(this).attr('data-id');
            // configBtn = $(this);
            // cartButton(productId, configBtn);


        if (customerItemArr.length > 0) {

            customerItemArr.forEach(function (item, index) {
                var i = 0;
                // var i > customerItemArr.length
                var itemsTotals = index + 1;
                let result = $('.cart-items').text(itemsTotals);
                // let productLen = $('.cart-items').text(itemsTotals);

                // console.log(itemsTotals);
            });

        }
        //  storage.saveCart(customerItemArr);
        window.localStorage.setItem('product', JSON.stringify(customerItemArr));
        populateCart2();

    });

    function pushItemToArray(item, array) {
        array.push(item);
    }

   
    
    $('#CheckOut').on('click', function (e) {
        e.preventDefault();
        console.log('CheckOut');
        showCart();
    });



    $('#closeModal').on('click', function (e) {
        e.preventDefault();
        console.log('i see u now');
        $('.modalShadow').modal('close');

    });

    $('#clearModal').click(function () {
        $('.modalShadow table tbody').html('');
        customerItemArr.length = 0;
        window.localStorage.removeItem('product');

        // console.log(customerItemArr);
        // clearCart();
        let i = 0;
        let result = $('.cart-items').text(i);
        $('.bag-btn').text('');
        $('.bag-btn').prop('disabled', false);
        $('.bag-btn').append('<i class="fas fa-shopping-cart">Buy</i>');
        $('.modalShadow').modal('close');

    });

    function deleteProduct() {
        $('.deleteProduct').click(function (e) {
            if (customerItemArr.length < 0) {
                $('.modalShadow').modal('close');
            } else {
                // console.log(e);
                e.preventDefault();
                let productId = $(this).attr('data-id');
                console.log(productId);
                customerItemArr = customerItemArr.filter(item => productId !== item[3]);
                console.log(customerItemArr);

                //  totalCost += parseInt(item[2]);
                // ('.modalShadow table').append('<tr class="totalCostParent"><th>TOTAL</th><th></th><th class="totalCost"></th></tr>');
                // $('.totalCost').text(totalCost);
                (e.target.parentElement.parentElement.parentElement).remove();
                // let removeProduct =  product.filter(item => productId !== item[3]);
                // window.localStorage.removeItem('product');

                // cart = cart.filter(item => item.id !== id);
                // this.setCartValues(cart);
                // storage.saveCart(cart);
                // localStorage.setItem('cart', JSON.stringify(cart));


                saveCart(customerItemArr);
                getSingleButtons(productId);
                removeItem(productId);

            }
        });
    }

    function increaseQuantity() {
        $('.up').on('click', function (e) {
            e.preventDefault();
            console.log(e);
            // let quantity = e.target;
            // console.log(quantity);
            // let id = quantity.dataset.id;
            // console.log(id);
            let productId = $(this).attr('data-id');
            // console.log(productId);
            let tempItem = customerItemArr.find(item => item[3] === productId);
            // console.log(tempItem);
            tempItem[4] = tempItem[4] + 1;
            console.log(tempItem[4]);
            window.localStorage.setItem('product', JSON.stringify(customerItemArr));
            e.target.nextElementSibling.innerText = tempItem[4];
            totalPrice();
            $('.totalCost').text(totalPrice());

        });
       
    }

    function decreaseQuantity() {
        $('.down').on('click', function (e) {
            e.preventDefault();
            console.log(e);
            // let quantity = e.target;
            // console.log(quantity);
            // let id = quantity.dataset.id;
            // console.log(id);
            let productId = $(this).attr('data-id');
            // console.log(productId);
            let tempItem = customerItemArr.find(item => item[3] === productId);
            // console.log(tempItem);
            tempItem[4] = tempItem[4] - 1;
            if (tempItem[4] > 0) {
                window.localStorage.setItem('product', JSON.stringify(customerItemArr));
                e.target.previousElementSibling.innerText = tempItem[4];
                totalPrice();
            } else {
                customerItemArr = customerItemArr.filter(item => productId !== item[3]);
                console.log(customerItemArr);
                (e.target.parentElement.parentElement.parentElement).remove();
                saveCart(customerItemArr);
                removeItem(productId);
                if (!customerItemArr.length > 0) {
                    console.log('less than zero');
                    $('.modalShadow').modal('close');

                }
                
            }

        });

    }

    function totalPrice() {
        var totalCost = 0;
        let itemsTotal = 0;
        let prac = 0;

        customerItemArr.map(item => {
            // totalCost += parseInt(item[2]);
            totalCost += item[2] * item[4];
            prac = parseFloat(totalCost.toFixed(2));
            // console.log(prac);
            itemsTotal += item[4];

        });
        
        $('.totalCost').text('$'+totalCost);
        $('.cart-items').text(itemsTotal);    //updates the cart numbers

    }

    function saveCart(customerItemArr){
        // console.log(customerItemArr);
        let cartNo = customerItemArr.length;
        console.log(cartNo);
       

        let resultTotal = $('.cart-items').text(cartNo);
        window.localStorage.setItem('product', JSON.stringify(customerItemArr));
        // localStorage.setItem('product', JSON.stringify(customerItemArr));
        // var totalCost = 0;
        customerItemArr.forEach(function (item, index) {
            var sn = index + 1;
            var tableRowContent2 = '<tr id="' + item[3] + '">\
                                                <td>' + sn + '</td>\
                                                <td>' + item[0] + '</td>\
                                                <td>$' + item[2] + '</td>\
                                                <td>' + item[3] + '</td>\
                                                <td data-id="'+ item[3] + '">1</td>\
                                                <td><a href="#!" class="red-text deleteProduct" id="pau" data-id="'+ item[3] + '"><i class="material-icons">delete</i></a></td>\
                                            </tr>';

            // $('.modalShadow table').append(tableRowContent2);
            // $('table').append(tableRowContent2);
            // totalCost += parseInt(item[2]);
            totalPrice();
            // console.log(totalCost);
            //pasrse init add up number e.g addition

        });
        // $('.modalShadow table').append('<tr class="totalCostParent"><th>TOTAL</th><th></th><th class="totalCost"></th></tr>');
        $('.totalCost').text(totalPrice());

        if (!customerItemArr.length > 0) {
            console.log('less than zero');
            $('.modalShadow').modal('close');

        }
    }

    $('#contactCheck').click(function () {
        $('#contactModal').modal('open');


        $(document).on('submit', '#contactForm', function (e) {
            e.preventDefault();
            let prdIds = [];
            let quantityId = [];
            customerItemArr.forEach(function (item, index) {
                prdIds.push(item[3])
                quantityId = [...quantityId, item[4]];
                // quantityId = [...quantityId, [
                //     quantity = item[4]
                // ]];
            });

            console.log(prdIds);
            console.log(quantityId);
            $('#contactForm').prepend(
                '<input type="hidden" id="pId" name="productId" value="' + prdIds + '">\
                <input type="hidden" id="quantity" name="quantity" value="' + quantityId+ '">'
                
            )
            

            var data = {
                'contactName': $('#contactName').val(),
                'contactEmail': $('#contactEmail').val(),
                'contactNumber': $('#contactNumber').val(),
                'contactMessage': $('#contactMessage').val(),
                'productId': $('#pId').val(),
                'quantity': $('#quantity').val(),

            }
            console.log(data);
            let formData = new FormData($('#contactForm')[0]);
            console.log(formData);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/home",
                data: data,
                success: function (response) {
                    console.log(response);
                    // console.log(removeItem(response.extraInfo));
                    $('#saveErr').html("");
                    $('#saveErr').addClass("red-text");
                    if (response.status == 400) {
                        $.each(response.errors, function (key, errValues) {
                            $('#saveErr').append('<li>' + errValues + '</li>');
                        });
                    } else {
                        $('#saveErr').html("");
                        $('#successMessage').addClass("green white-text");
                        // $('#successMessage').text(response.message);
                        alert(response.message);
                        $('#contactModal').modal('close');
                        $('#contactModal').find('input').val("");
                        // clearCart();
                        let tempId = response.extraInfo;
                        let productId = tempId.toString();
                        console.log(productId);
                        // $('.modalShadow table').html('');
                        $('.modalShadow table tbody').empty();
                        // $('.modalShadow table tbody').html('');
                        customerItemArr.length = 0;
                        window.localStorage.removeItem('product');
                        let i = 0;
                        let result = $('.cart-items').text(i);
                        $('.bag-btn').text('');
                        $('.bag-btn').prop('disabled', false);
                        $('.bag-btn').append('<i class="fas fa-shopping-cart">Buy</i>');
                        $('.modalShadow').modal('close');

                        location.reload();
                    }
                }
            });
        });

    });

   
});

function getCart() {
    // cartButton();
    return localStorage.getItem('product') ? JSON.parse(localStorage.getItem('product')) : [];   //TINERAY STATEMENT IF/ELSE
    
}


function cartButton() {
    //the three dots turns d document into an Array
    const buttons = [...document.querySelectorAll(".bag-btn")];
    // const buttons = [...$(".bag-btn")];
    console.log(buttons);
    buttonsDOM = buttons;  

    buttons.forEach(button => {
        // let id = button.dataset.id;
        // console.log(id);
        let productId = $(button).attr('data-id');
        // let productId = button.dataset.id;
        console.log(productId);
    //   let configBtn = $(button);
        // console.log(configBtn);
      let inCart = customerItemArr.find(item => item[3] === productId);
    //   let inCart = customerItemArr.find(item => productId === item[3]);
        // let inCart = customerItemArr.find(function (item) {
        //     console.log(item);
        // });
        // console.log(inCart);
        // filter(item => productId !== item[3]);
       
        let buttonToggle = getSingleButtons(productId);
        if (inCart) {

            buttonToggle.innerText = "In Cart";
            // console.log(inCart);
            // console.log('ok nah');

            // configBtn.removeClass('addToCart').text('In Cart').prop('disabled', true);
            buttonToggle.disabled = true;
        }

        $('.addToCart').click(function (e) {

            e.preventDefault();
            let productId = $(this).attr('data-id');
            configBtn = $(this);
            console.log('es8');
            console.log(productId);
            console.log(configBtn);
            let inCart2 = customerItemArr.find(item => item[3] === productId);
            if (inCart2) {
                buttonToggle.innerText = "In Cart";
                // buttonToggle.removeClass('addToCart').text('In Cart').prop('disabled', true);
                buttonToggle.disabled = true;
            }
        });

    });
    // $('.bag-btn').on('click', function (e) {
    //     e.preventDefault();
    //     console.log('es8');
    //     let productId = $(this).attr('data-id');
    //     console.log(productId);

    // });

}

function getSingleButtons(productId) {

    // return buttonsDOM.find(button => button[3] === customerItemArr);
    return buttonsDOM.find(button => button.dataset.id === productId);

    // let inCart = buttonsDOM.find(function (item) {
    //     console.log(item);
    //     console.log(item[3]);
    //     // console.log(customerItemArr);
    //     console.log(productId);
    //     console.log(buttonsDOM);
    // });
}

function removeItem(productId) {
    console.log(productId);
    customerItemArr = customerItemArr.filter(item => item[3] !== productId);
    // this.setCartValues(customerItemArr);
    // storage.saveCart(customerItemArr);
    let button = getSingleButtons(productId);
    console.log(button);
    // button.disabled = false;
    // button.addClass = `bag-btn`;  // `` TEMPLETE LITRAL 
    // button.classList.add("bag-btn");
    // button.innerHTML = `<i class="fas fa-shopping-cart"></i>Buy`;  // `` TEMPLETE LITRAL 
    // button.removeClass('addToCart').text('Buy').prop('disabled', false);$('.bag-btn').text('');
    $(button).text('');
    $(button).prop('disabled', false);
    $(button).append('<i class="fas fa-shopping-cart">Buy</i>');

}

document.addEventListener("DOMContentLoaded", () => {
    // setupApp();
    getCart();
    cartButton();

    product = JSON.parse(window.localStorage.getItem('product'));
    console.log(product); 
});