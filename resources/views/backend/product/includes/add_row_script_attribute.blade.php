<script>

    var attribute_wrapper = $("#attribute_wrapper"); //Fields wrapper
    var add_button_attribute = $("#addMoreAttribute"); //Add button ID
    var y ={{$data['count_attribute']}};
    $(add_button_attribute).click(function (e) { //on add input button click
        e.preventDefault();
        var max_fields = 5; //maximum input boxes allowed
        if (y < max_fields+1) { //max input box allowed
            y++; //text box increment
            //add new row
            $("#attribute_wrapper tr:last").after(
                '<tr>'+
                '   <td>{!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                '   </td>'+
                '   <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                '   <td>'+
                '<button id="blank" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>'+

            // '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                '   </td>'+
                '</tr>'
            );
        } else {
            alert('Maximum Image Limit is 5');
        }
    });

    // $(attribute_wrapper).on("click", ".remove_row", function (e) {
    //     e.preventDefault();
    //     $(this).parents("tr").remove();
    //     y--;
    // });

    $(attribute_wrapper).on("click", ".remove_row", function (e) {
        e.preventDefault();
        if($(this).attr('id')=="blank"){
            $(this).parents("tr").remove();
            y--;
        }else{
        var product_attribute = $(this).attr('id');
        var path = "{{route('backend.ajax.product.deleteProductattribute')}}";
        $.ajax({
            url:path,
            data:{'product_attribute_id':product_attribute},
            method:'get',
            dataType:'text',
            success:function(resp) {
                if (resp.trim() == "1") {
                    $('#' + product_attribute).parents("tr").remove();
                }
                y--;
                // if (resp.trim() == "blank"){
                //     $('#blank').parents("tr").remove();
                //     y--;
                // }
            }

        });}
    });

</script>