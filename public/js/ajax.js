/**
 * Created by Gadir on 5/24/2017.
 */
var category_id;
var supplier_id;
$(document).ready(function () {
    $('select[name="category"]').on('change', function () {
        var id = $(this).val();
        category_id = id;
        var sup_id = supplier_id;
        if (supplier_id > 0) {
            $.ajax({
                url: '/findProductNameByCategoryAndSupplier/' + category_id + '/' + sup_id,
                type: "GET",
                dataType: "json",
                success: function (products) {
                    $('select[name="product"]').empty();
                    $('div[name="price"]').empty();
                    for (var i = 0; i < products.length; i++) {
                        $('select[name="product"]').append('<option value="' + products[i].id + '">' + products[i].product_name + '</option>');
                    }
                    $('select[name="product"]').append('<option disabled selected>Select Product</option>');
                }

            });
        } else {
            $.ajax({
                url: '/findProductNameByCategory/' + id,
                type: "GET",
                dataType: "json",
                success: function (products) {
                    $('select[name="product"]').empty();
                    $('h2[name="price"]').empty();
                    for (var i = 0; i < products.length; i++) {
                        $('select[name="product"]').append('<option value="' + products[i].id + '">' + products[i].product_name + '</option>');

                    }
                }
            });
        }
    });
});

$(document).ready(function () {
    $('select[name="supplier"]').on('change', function () {
        var sup_id = $(this).val();
        supplier_id = sup_id;
        if (sup_id) {
            $('select[name="product"]').empty();
            $.ajax({
                url: '/findProductNameByCategoryAndSupplier/' + category_id + '/' + sup_id,
                type: "GET",
                dataType: "json",
                success: function (products) {
                    $('select[name="product"]').empty();
                    $('h2[name="price"]').empty();
                    for (var i = 0; i < products.length; i++) {
                        $('select[name="product"]').append('<option value="' + products[i].id + '">' + products[i].product_name + '</option>');
                    }
                    $('select[name="product"]').append('<option disabled selected>Select Product</option>');
                }

            });
        } else {
            $('select[name="product"]').empty();
        }
    });
});
var p_price;
$(document).ready(function () {
    $("#price").hide();
    $("#priceLabel").hide();
    $('select[name="product"]').on('change', function () {
        var prod_id = $(this).val();
        if (prod_id) {
            $.ajax({
                url: '/findProductPriceById/' + prod_id,
                type: "GET",
                dataType: "json",
                success: function (price) {
                    $("#price").val(price[0].price);
                    $("#price").show();
                    $("#priceLabel").show();
                    p_price = price[0].price;
                }

            });
        } else {
            $('h2[name="price"]').empty();
        }
    });
});
var total;
$(document).ready(function () {
    $("#total").hide();
    $("#totalLabel").hide();
    $('input[name="quantity"]').on('change', function () {
        $("#total").empty();
        var quantity = $("#quantity").val();
        total = p_price * quantity;
        $("#total").val(total);
        $("#total").show();
        $("#totalLabel").show();

    });
});