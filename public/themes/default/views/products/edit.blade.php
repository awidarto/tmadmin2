@extends('layout.front')


@section('content')

<h3>{{$title}}</h3>


{{Former::open_for_files_horizontal($submit,'POST',array('class'=>'custom'))}}

{{ Former::hidden('id')->value($formdata['_id']) }}
<div class="row">
    <div class="col-md-6">

        {{ Former::text('SKU','SKU') }}
        {{ Former::select('status')->options(array('inactive'=>'Inactive','active'=>'Active'))->label('Status') }}
        {{-- Former::select('category','Category')->options(Prefs::ExtractProductCategory()) --}}
        {{ Former::select('categoryLink','Category')->options(Prefs::getProductCategory()->productCatToSelection('slug', 'title' )) }}
        {{ Former::text('series','Series') }}
        {{ Former::text('itemDescription','Description') }}
        {{ Former::text('itemGroup','Item Group')->help('for compound product only') }}
        {{ Former::text('priceRegular','Regular Price')->class('form-control col-md-4') }}
        {{ Former::text('priceDiscount','Discount Price')->class('form-control col-md-4') }}

        {{ Former::text('discFromDate','Disc. From')->class('form-control col-md-7 offset-2 eventdate')
            ->id('fromDate')
            //->data_format('dd-mm-yyyy')
            ->append('<i class="fa fa-th"></i>') }}

        {{ Former::text('discToDate','Disc. Until')->class('form-control col-md-7 offset-2 eventdate')
            ->id('toDate')
            //->data_format('dd-mm-yyyy')
            ->append('<i class="fa fa-th"></i>') }}

        {{ Former::text('material','Material') }}
        {{ Former::text('colour','Colour')->class('form-control col-md-4') }}
        {{--

        <div class="row form-vertical">
            <div class="col-md-4">
                {{ Former::text('colour','Colour')->class('form-control col-md-12') }}
            </div>
            <div class="col-md-4">
                {{ Former::text('colourHex','')->class('form-control pick-a-color') }}
            </div>
        </div>
        --}}

        <div class="row form-vertical">
            <div class="col-md-4">
                {{ Former::text('W','Width')->class('form-control')}}
            </div>
            <div class="col-md-4">
                {{ Former::text('H','Height')->class('form-control') }}
            </div>
            <div class="col-md-4">
                {{ Former::text('L','Length')->class('form-control') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                {{ Former::text('D','Diameter')->class('form-control')}}
            </div>
            <div class="col-md-4">
                {{ Former::text('sizeDescription','Dimension Description') }}
            </div>
        </div>

        {{ Former::text('tags','Tags')->class('tag_keyword') }}

        {{ Former::text('relatedProducts','Related Products')->class('tag_related') }}

        {{ Former::text('recommendedProducts','Recommended Products')->class('tag_recommended') }}

    </div>
    <div class="col-md-6">
        <div class="row form-vertical">
            <div class="col-md-2" style="text-align:right;width:120px;">
                Inventory
            </div>
            <div class="col-md-9" style="padding-left:10px;">
                <table class="table " >
                    <tr>
                        <th>
                            Outlet
                        </th>
                        <th>
                            Sold
                        </th>
                        <th>
                            Reserved
                        </th>
                        <th>
                            Avail.
                        </th>
                        <th>
                            Add Qty.
                        </th>
                        <th>
                            <span style="color:red;">(Adjust Qty.)</span>
                        </th>
                    </tr>
                    @foreach( Prefs::getOutlet()->OutletToArray() as $o)
                        <tr>
                            <td>
                                {{ $o->name }}
                            </td>
                            <td>
                                {{ $formdata['stocks'][$o->_id]['sold'] }}
                            </td>
                            <td>
                                {{ $formdata['stocks'][$o->_id]['reserved'] }}
                            </td>
                            <td>
                                {{ $formdata['stocks'][$o->_id]['available'] }}
                            </td>
                            <td>
                                <input type="hidden" name="outlets[]"  value="{{ $o->_id }}">
                                <input type="hidden" name="outletNames[]"  value="{{ $o->name }}">
                                <input type="text" class="col-md-10" id="{{ $o->_id }}" name="addQty[]" value="" />
                            </td>
                            <td>
                                <input type="text" class="col-md-10" id="{{ $o->_id }}" name="adjustQty[]" value="" />
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

        <?php
            $fupload = new Fupload();
        ?>

        {{ $fupload->id('imageupload')->title('Select Images')->label('Upload Images')->make($formdata) }}

    </div>
</div>

<div class="row right">
    <div class="col-md-12">
        {{ Form::submit('Save',array('class'=>'btn btn-primary'))}}&nbsp;&nbsp;
        {{ HTML::link($back,'Cancel',array('class'=>'btn'))}}
    </div>
</div>
{{Former::close()}}

{{ HTML::style('css/autocompletes.css') }}
{{ HTML::script('js/autocompletes.js') }}



<script type="text/javascript">

$(document).ready(function() {

    $('.pick-a-color').pickAColor({
        showHexInput:false
    });

    $('#name').keyup(function(){
        var title = $('#name').val();
        var slug = string_to_slug(title);
        $('#permalink').val(slug);
    });


});

</script>

@stop