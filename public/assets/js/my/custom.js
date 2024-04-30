
// delete with sweetalert page =============================

$(".delete_confirm_feedback").on('click',function(e){
e.preventDefault();
var delete_id  = $(this).attr('delete_id');
swal({
        title: "Are you sure you want to delete this record?",
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        type: "warning",
        buttons: ["Cancel","Yes!"],
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((willDelete) => {
        if (willDelete) {
            var url = 'feedback/delete/'+delete_id;
            alert(url);
          return window.location.href=url;
        }
    });
});



$('.rating').on('keypress', function(e) {
    // Allow only numbers
    if (e.which < 48 || e.which > 57) {
        e.preventDefault();
    }
});

$('.rating').on('input', function(e) {
    e.preventDefault();
    var rat = $(this).val();
    if (isNaN(rat) || rat < 1 || rat > 5) {
        $(this).addClass('error');
        $('.rating-error').text('Please enter 1 to 5 number only')
    } else {
        $(this).removeClass('error');
        $('.rating-error').text('')

    }
});
