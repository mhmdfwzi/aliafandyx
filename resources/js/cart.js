
(function($){

          $('.item_quantity').on('change',function(e){

                    e.preventDefault();
                    var quantity = $(this).data('id');
                    console.log(quantity);
                    $.ajax({
                              url:"/cart/" + $(this).data('id'),
                              method:'put',
                              data:{ 
                                        quantity: $(this).val(),
                                        _token:csrf_token
                               }
                    });
          
          });


          // $('.remove-item').on('click',function(e){

          //           let $id = $(this).data('id');
          //           $.ajax({
          //                     url:"/cart/" + $id,
          //                     method:'delete',
          //                     data:{ 
          //                               _token:csrf_token
          //                      },
          //                      success: response =>{
          //                               $(`#${id}`).remove();
          //                      }
          //           });
          
          // });

          $('.remove-item').on('click', function (e) {
                    e.preventDefault(); // Prevents the default behavior of the anchor tag
                
                    let $id = $(this).data('id');
                    let csrf_token = '{{ csrf_token() }}'; // Ensure the token is retrieved correctly
                
                    $.ajax({
                        url: "/cart/" + $id,
                        method: 'delete',
                        data: {
                            _token: csrf_token
                        },
                        success: response => {
                            $(`#${$id}`).remove(); // Use $id instead of id
                        }
                    });
                });
                


})(jQuery);