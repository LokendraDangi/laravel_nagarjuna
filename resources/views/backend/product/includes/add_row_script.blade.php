<script>

    var image_wrapper = $("#image_wrapper"); //Fields wrapper
    var add_button_image = $("#addMoreImage"); //Add button ID
    var x = {{$data['count_image']}};
    $(add_button_image).click(function (e) { //on add input button click
        e.preventDefault();
        var max_fields = 5; //maximum input boxes allowed
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            //add new row
            $("#image_wrapper tr:last").after(
                '<tr>'
                + ' <td><input type="file" name="product_image[]" class="form-control" /></td>'
                + ' <td><input type="text" name="image_title[]" class="form-control" placeholder="Enter Image Title" /></td>'
                + '<td>'
                +'<button id="blank" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>'
                // + '<a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'
                + '</td>'
                + '</tr>'
            );
        } else {
            alert('Maximum Image Limit is 5');
        }
    });
    //
    // $(image_wrapper).on("click", ".remove_row", function (e) {
    //     e.preventDefault();
    //     $(this).parents("tr").remove();
    //     x--;
    // });

    // var image_list = $("#image_list"); //Image list wrapper
    $(image_wrapper).on("click", ".remove_row", function (e) {
        e.preventDefault();
        if($(this).attr('id')=="blank"){
            $(this).parents("tr").remove();
            x--;
        }else {
            var product_image = $(this).attr('id');
            var path = "{{route('backend.ajax.product.deleteProductImage')}}";
            $.ajax({
                url: path,
                data: {'product_image_id': product_image},
                method: 'get',
                dataType: 'text',
                success: function (resp) {
                    if (resp.trim() == "1") {
                        $('#' + product_image).parents("tr").remove();
                        x--;
                    }
                }
            });
        }
    });

</script>