$(".view-orders").click(function(){
    var orderDate = JSON.parse($(this).attr('order-data'))
    console.log("data", orderDate.product_price);
    var description = orderDate.product_description;
    var modifiedString = description.replace(/\n/g, ',');
    $('.total-price ,.total-subtotal').text("₹"+orderDate.product_price);
    $('.total-shipping').text("+₹0"+orderDate.delivery_charge === '+₹0null' || "+₹0"+orderDate.delivery_charge === '' ?  '+₹0' : "+₹0"+orderDate.delivery_charge);
    $('.product-description').text(modifiedString);
    $('.product-name').text(orderDate.product_name);
    $('.product-image').attr('src',orderDate.image)
    $('#startet-modal').modal('show');
      
  });