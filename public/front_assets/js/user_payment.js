$(".view-orders").click(function(){
    var orderDate = JSON.parse($(this).attr('order-data'))
    console.log("data", orderDate);
    $('.total-price ,.total-subtotal').text("₹"+orderDate.total_price);
    $('.total-shipping').text("+₹0"+orderDate.delivery_charge === '+₹0null' || "+₹0"+orderDate.delivery_charge === '' ?  '+₹0' : "+₹0"+orderDate.delivery_charge);
    $('.product-description').text(orderDate.product_description);
    $('.product-name').text(orderDate.product_name);
    $('.product-name').text(orderDate.product_name);
    console.log("image",orderDate.image);
    $('.product-image').attr('src',orderDate.image)
    $('#startet-modal').modal('show');
      
  });