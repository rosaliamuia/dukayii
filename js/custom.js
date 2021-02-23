$(document).ready(function() {
const $itemQuantities= $('.item-quantity');
const $cartQuantity = $('#cart-quantity');
var baseUrl = $(this).attr('baseUrl');

    $('.addbrand').click(function(e){
        e.preventDefault();
        $.get('addbrand', function(data) {
            $('#addbrand').modal('show')
            .find('#addbrandContent')
            .html(data);
        })
    })

    $('.addcat').click(function(e){
        e.preventDefault();
        $.get('addcat', function(data) {
            $('#addcat').modal('show')
            .find('#addcatContent')
            .html(data);
        })
    })


    $('.addcolor').click(function(e){
        e.preventDefault();
       $.get('addcolor',function(data){
            $('#addcolor').modal('show')
                 .find('#addcolorContent')
                 .html(data);
    })
})

$('.uom').click(function(e){
    e.preventDefault();
   $.get('uom',function(data){
        $('#uom').modal('show')
             .find('#uomContent')
             .html(data);
})
})

// $(document).ready(function() {

//     $('.deposit').click(function(e){
//         e.preventDefault();
//         var baseUrl= $(this).attr('baseUrl');
//         $.get(baseUrl+'/deposit/deposit',function(data) {
//             $('#deposit').modal('show')
//             .find('#depositContent')
//             .html(data);
//         })
//     })

// });

$('.addtocart').click(function(e){
    e.preventDefault();
    const $cartQuantity = $('#cart-quantity');
    var productid= $(this).attr('productid');
    var userid = $(this).attr('userid');
    var baseUrl = $(this).attr('baseUrl');
    var quantity = $("#quantity_"+productid).val();

    $.ajax({
        url: baseUrl+"/site/addtocart?productid="+productid+"&userid="+userid+"&quantity="+quantity,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
            $cartQuantity.text(parseInt($cartQuantity.text() || 0) + 1);
        }
    }); 

    alert(productid+' and '+userid+' and '+quantity);
    
});

$itemQuantities.change(ev => {
    const $this = $(ev.target);
    const id = $this.closest('tr').data('productId');
    $.ajax({
        method: 'post',
        url: 'http://localhost/tr/site/change-quantity', 
        data: {id, quantity: $this.val()},
        success: function(){
            console.log(arguments)
        }
    })
})

$('.addtoorder').click(function(e){
    e.preventDefault();
    const $cartQuantity = $('#cart-quantity');
    var productId= $(this).attr('productId');
    var userId = $(this).attr('userId');
    var baseUrl = $(this).attr('baseUrl');
    var total = $("#total_"+productId).val();

    $.ajax({
        url: baseUrl+"/site/order?productId="+productId+"&userId="+userId+"&total="+total,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
            $cartQuantity.text(parseInt($cartQuantity.text() || 0) + 1);
        }
    }); 

    alert(productId+' and '+userId+' and '+total);
    
});

});



