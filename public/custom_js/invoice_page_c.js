$(document).ready(function () {
    $("[id^=page_linkc]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

        //var token = $("input[name='_token']").val();
        $.ajax({
        url: "invoice_list_pagination_start_cancelled",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tablec").html('');
          $("#main_content_tablec").html(data.options);
        }
        });

        });

        //next page button
        $("#npage_linkc").click(function(){

        var id_for_pass = 2;

        $.ajax({
        url: "invoice_list_pagination_start_cancelled",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tablec").html('');
          $("#main_content_tablec").html(data.options);
        }
        });

        });


        $("[id^=apage_linkc]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(11);
            //alert(id_for_pass);

            // var token = $("input[name='_token']").val();
            $.ajax({
            url: "invoice_list_pagination_start_cancelled",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tablec").html('');
              $("#main_content_tablec").html(data.options);
            }
            });

            });

            //next button
            $("[id^=napage_linkc]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(12);
            var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "invoice_list_pagination_start_cancelled",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tablec").html('');
              $("#main_content_tablec").html(data.options);
            }
            });

            });
            //end next button


            //previous button
            $("[id^=papage_linkc]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(12);
            var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "invoice_list_pagination_start_cancelled",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tablec").html('');
              $("#main_content_tablec").html(data.options);
            }
            });

            });
            //end previous button
});
