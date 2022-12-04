<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
   <style>
        body {
            color: #333639;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* .body_size
        {
            width: 75mm;
            height: 100mm;
            padding: 3px;
        } */

        @page  {
      size: 75mm 100mm;
      margin: 3px;
    }

        table {
            width: 100%;
        }

        .first_table tr td {
            width: 50%;
        }

        .first_table tr td:nth-child(1) img {
            height:70px;
            width:70px;
        }

        .first_table tr td:nth-child(2)
        {
            text-align: right;
        }

        .first_table tr td:nth-child(2) img {
            height:40px;
            width:40px;
        }

        .first_table tr td:nth-child(2) p {
            font-size:8px;
            padding:0;
            margin:0;
        }
        .first_table tr td:nth-child(2) h4 {
            font-size:12px;
            padding:0;
            margin:0;
        }

        hr{
            margin-bottom: 0;
            margin-top:0;
        }

        .second_table tr td {
            font-size: 13px;
            vertical-align: top;
        }

        .second_table tr td:nth-child(1) {
            width: 40%;
        }
        .second_table tr td p{
            margin: 0;
            padding: 2px;
        }

        .second_table tr td:nth-child(2)
        {
            font-weight: bold;
            width: 60%;
        }

        .third_table {
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 10px;
        }
        .third_table th {
            padding: 2px;
            text-align: left;
            background-color: #F8F9FA;
            border: 1px solid #e9ecef;
        }

        .third_table tr th:nth-child(2)
        {
            width: 40px;
        }

        .third_table td {
            border: 1px solid #e9ecef;
            padding: 4px;
        }

        .forth_table
        {
            font-size: 12px;
            vertical-align: top;
        }
        .forth_table tr td:nth-child(1)
        {
            width: 40%;
        }
        .forth_table tr td:nth-child(2)
        {
            width: 60%;
        }

        .inner-table tr td:nth-child(1)
        {
            width: 65%;
        }
    </style>
</head>
<body>



            <table class="first_table">
        <tr>
            <td>
                <img src="{{ asset('public/new_admin/assets/images/rqr.jpg') }}" height="50" alt="">
            </td>
            <td>
                <img src="{{ asset('/') }}{{ $logo }}" height="50" alt="">
                <p style="font-weight: bold;">Merchant No: +880178600000</p>
                <h4>rr.com</h4>
            </td>
        </tr>
    </table>

    <hr>

    <table class="second_table">
        <tr>
            <td>Shop Name</td>
            <td>:{{ $consigment_detail->shop_name }}</td>
        </tr>
        <tr>

            <td>Mobile Number</td>
            <td>:{{ $consigment_detail->contact }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:{{ $consigment_detail->delivery_address }}</td>
        </tr>
    </table>



<table class="third_table">

    <thead>
    <tr>
       <th style="width:5%">#</th>
                <th style="width:55%">Item</th>

                <th style="width:5%">Q.T</th>

    </tr>
    </thead>
    <tbody>
        <?php


        $total_quantity = 0;



                                        ?>
        @foreach ($consigment_main_detail as $key => $invoice_detail_all)

        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $invoice_detail_all->product_name }}</td>

                            <td>{{ $invoice_detail_all->quantity }}</td>


                        </tr>
                        <?php  $total_quantity = $total_quantity + $invoice_detail_all->quantity; ?>

        @endforeach

    </tbody>
</table>

<table class="forth_table">


    <tr>
    <td>
                <h4>Total:{{ $total_quantity }} <br> <span style="font-size:8px;">Powered By ResNova Tech Limited</span>
                </h4>
            </td>

  </tr>
</table>

</body>
</html>