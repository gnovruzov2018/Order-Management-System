/**
 * Created by Gadir on 5/26/2017.
 */
var query_name;
var pagesize;
var pageNum;

$(document).ready(function() {
    getOrders(query_name,pageNum);
    $('#noResult').hide();
    $('#detailsTable').show();
});
$(document).ready(function(){
    $("#search").click(function(){
        var query_name = $('input[name="query_shipper_name"]').val();
        $('#tableBody').empty();
        getOrders(query_name,pageNum);
    });
});
$(document).ready(function () {
    for (var i = 1; i<5; i++){
        $('#pagination').append('<li><button class="btn btn-default btn-sm" type="button" value="'+i+'" >'+i+'</button></li>');
    }
});
$(document).ready(function()
{
    $(document).on('click', '#pagination button',function(event)
    {
        $('#tableBody').empty();
        pageNum = $(this).val();
         getOrders(query_name,pageNum)
    });
});

function getOrders(query,pageNum) {
    if(!pageNum>0){
        pageNum = 1;
    }
    if (query==='undefined'||query==null||query=="") {
        $.ajax({
            url: '/paginate/'+pageNum,
            type: "GET",
            dataType: "json",
            success: function (data) {

                for (var i = 0; i < data.length; i++) {
                    $('#tableBody').append('<tr>'
                        + '<td>' + data[i].id + '</td>'
                        + '<td>' + data[i].customer_name + '</td>'
                        + '<td>' + data[i].first_name + '</td>'
                        + '<td>' + data[i].shipper_name + '</td>'
                        + '<td>' + data[i].product_name + '</td>'
                        + '<td>' + data[i].price + '</td>'
                        + '<td>' + data[i].quantity + '</td>'
                        + '<td>' + data[i].order_date + '</td>'
                        + '</tr>'
                    );
                }
            }

        });
    }else{
        $('#tableBody').empty();
        $.ajax({
            url: '/paginateSearch/'+query+'/'+pageNum,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data.length);
                pagesize = data.length;
                if(data.length>0) {
                    $('#detailsTable').show();
                    $('#noResult').hide();
                    for (var i = 0; i < data.length; i++) {
                        $('#tableBody').append('<tr>'
                            + '<td>' + data[i].id + '</td>'
                            + '<td>' + data[i].customer_name + '</td>'
                            + '<td>' + data[i].first_name + '</td>'
                            + '<td>' + data[i].shipper_name + '</td>'
                            + '<td>' + data[i].product_name + '</td>'
                            + '<td>' + data[i].price + '</td>'
                            + '<td>' + data[i].quantity + '</td>'
                            + '<td>' + data[i].order_date + '</td>'
                            + '</tr>'
                        );
                    }
                }else{
                    $('#detailsTable').hide();
                    $('#noResult').show();
                } }

        });
    }
}
$(document).ready(function () {
    $('select[name="supplier"]').on('change', function () {
        var sup_id = $(this).val();
        supplier_id = sup_id;
    });
});