<html>
<head>
    <title>Delivery Slip</title>

<style type="text/css">
    body{
        font-size: {{ $font_size }}pt;
        background-color:white;
        padding-top: {{ $top_offset}}px;
        padding-left: {{ $left_offset}}px;
    }
    .label{
        float: left;
        font-family: Arial, sans-serif;
        max-height: {{ $cell_height }}px;
        min-height: {{ $cell_height }}px;
        height: {{ $cell_height }}px;

        max-width: {{ $cell_width }}px;
        min-width: {{ $cell_width }}px;
        width: {{ $cell_width }}px;

        margin-right: {{ $margin_right }}px;
        margin-bottom: {{ $margin_bottom }}px;
        display: table-cell;

        border: thin ridge #ddd;
        padding: 0px;/* add padding offset = padding * column count */
    }

    @media print {
        .label{
            border: none;
        }
    }

    .label table{
        width: 100%;
        height: 100%;
        border: none;
        font-size: {{ $font_size; }}pt;
        padding: 0px;
        margin: 0px;
    }

    h3{
        margin: 4px 10px;
        font-size: 1.1em;
    }

    tr{
        padding:0px;
    }

    td{
        padding: 0px;
        font-size: .8em;
        word-wrap: break-word;
    }

    p{
        margin-bottom: 4px;
        margin-top: 4px;
    }

    p.shipping{
        word-wrap:break-word;
        @if($code_type == 'barcode')
            display: inline-block;
        @endif
        max-width: {{ $cell_width; }}px;
    }

    img.barcode{
        max-width: 98%;
        width: 98%;
        height:auto;
        margin: 0px;

    }

    img.qr{
        max-width: 80px;
        height:auto;
    }

    .code-container{
        display: inline-block;
        float: left;
    }

    img.logo{
        max-height:25px;
    }

    <?php
        $container = ($cell_width * $columns) + ($margin_right * $columns) + $margin_right + ( 4 * $columns ) + 20;
    ?>

    #container{
        width: {{ $container; }}px;
        max-width: {{ $container; }}px;
        display: block;
    }


    @font-face {
        font-family: IDAutomationHC39M;
        src: url(http://www.idautomation.com/barcode-fonts/woff-web-fonts/IDAutomationHC39M.woff);
    }

    @font-face {
        font-family: "barcode128";
        src: url("{{  URL::to('code128/fonts/code128.ttf'); }}") format("truetype");
    }

    .barcodebar{
        font-family: 'barcode128';
        font-size: 24px;
    }

    .barcodetxt{
        font-size: 8px;
    }

</style>
</head>
<body>
<div id="container">

@foreach( $labels as $l )
    <?php $pd = $products[ $l['SKU'] ]; ?>
    <div class="label">
        <table>
            <tr>
                <td colspan="2" style="text-align:center">
                    {{ isset($pd['itemDescription'])?$pd['itemDescription']:'';}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <span class="barcodebar" >{{$l['_id']}}</span>
                    <br />
                    <span class="barcodetxt" >{{$l['_id']}}</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    TOIMOI
                </td>
                <td style="text-align:center">
                    {{ Ks::idr($pd['priceRegular'])}}
                </td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>

</div>

</body>
</html>
