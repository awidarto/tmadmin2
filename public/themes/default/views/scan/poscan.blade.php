<div id="btn-func" class="btn-group" data-toggle="buttons-radio">
  <button type="button" id="new-session" class="action-select btn btn-large btn-primary active">New</button>
</div>

<div id="session-list" class="btn-group" data-toggle="buttons-radio">
    <?php $cnt = 0 ;?>
    @foreach($additional_page_data['open_sessions'] as $sess)
        <button type="button" id="{{ $sess }}" class="session-select {{ ($cnt == 0)?'active':'' }} btn btn-large">{{ $cnt++ }}</button>
    @endforeach

</div>
    {{ Former::hidden('current_session')->id('current_session')}}

<div class="form-horizontal">
    <div id="outlet-box">
        {{ Former::select('outlet')->options(Prefs::getOutlet()->OutletToSelection('id','name',false) )->id('scanoutlet') }} &nbsp;<span>select one of existing outlet before scanning</span><br /><br />
    </div>

    {{ Former::text('barcode','')->id('barcode')->class('span9 scan-in')->autocomplete('off')->placeholder('Put cursor in this box before scanning') }}

    <div id="scanResult">

    </div>
    <div>
        <h1 id="total" ></h1>
    </div>
</div>

<style type="text/css">
    #session-list button,
    #btn-func button{
        font-size: 24px;
        font-weight: bold;
        min-width: 150px;
        margin-bottom: 30px;
    }

    #btn-func button.active{
        /*
        background-color: #211;
        color: #eee;
        */
    }

    #session-list button{
        min-width: 50px;
    }

    #session-list button.active{
        /*
        background-color: maroon;
        color: #eee;
        */
    }

    input.scan-in{
        font-size: 26px;
        line-height: 30px;
        height:55px;
    }

</style>

<script type="text/javascript">


$(document).ready(function() {

    $('#barcode').focus();

    populateSession($('#scanoutlet').val());

    $('button.action-select').on('click',function(){
        var action = $(this).html();
        console.log(action);
        if(action == 'Sell'){
            $('#outlet-box').hide();
        }

        if(action == 'Check'){
            $('#outlet-box').show();
        }

        if(action == 'Deliver'){
            $('#outlet-box').show();
            $('[for="scanoutlet"]').html('Deliver To');
        }

        if(action == 'Return'){
            $('#outlet-box').show();
            $('[for="scanoutlet"]').html('Return To');
        }

    });

    $('#session-list').on('click',function(e){
        var session = e.target.id;
        console.log(session);
        $('#current_session').val(session);
        oTable.fnDraw();
    });

    $('#barcode').on('keyup',function(ev){
        if(ev.keyCode == '13'){
            onScanResult('add');
        }
        //$('#barcode').val($('#barcode').val() + event.keyCode);
    });

    $('#barcode').on('focus',function(ev){
        $('#barcode').val('');
        //$('#barcode').val($('#barcode').val() + event.keyCode);
    });

    $('#scanoutlet').on('change',function(){
        var id = $(this).val();
        populateSession(id);
    });

    $('#new-session').on('click',function(){

        var session_list = $('#session-list button');
        var newsession = makesession();
        var label = session_list.length + 1;

        console.log(session_list);

        var newitem = $('<button>').html(label).attr('class','session-select btn btn-large active').data('session',newsession).attr('id',newsession);

        $('#session-list button').removeClass('active');
        $('#session-list').append(newitem);
        $('#current_session').val(newsession);

    });

    function populateSession(outlet){
        $.post('{{ URL::to('pos/opensession') }}',
            {
                'outlet_id': outlet,
            },
            function(data){
                $('#session-list').html('');
                $('#current_session').val('');
                var label = 0;
                $.each(data.opensession, function( index, value ) {
                    var newitem = $('<button>').html(label + 1).attr('class','session-select btn btn-large active').data('session',value).attr('id',value);
                    if(label > 0){
                        newitem.removeClass('active');
                    }else{
                        $('#current_session').val(value);
                    }
                    label++;
                    $('#session-list').append(newitem);
                });
                oTable.fnDraw();
            },'json'
        );

    }

    function onScanResult(action){
        var txtin = $('#barcode').val();
        var outlet_id = $('#scanoutlet').val();
        var session = $('#current_session').val();
        var action = action;

        console.log(session);

        if( outlet_id == '' || txtin == '' ){
            alert('Select outlet before scanning');
            $('#barcode').focus();
            $('#barcode').val('');
        }else if( typeof session =='undefined' || session == ''){
            alert('No session defined, click on New button to start new session');
        }else{

            var search_outlet = ($('#outlet-active').is(':checked'))?1:0;

            $.post('{{ URL::to('pos/scan') }}',
                {
                    'txtin':txtin,
                    'outlet_id': outlet_id,
                    'search_outlet': search_outlet,
                    'session':session,
                    'action':action
                },
                function(data){
                    if(data.result == 'OK'){
                        oTable.fnDraw();
                    }
                    $('#scanResult').html(data.msg);
                    $('#total').html(data.total_price);
                    $('#barcode').val('');
                    $('#barcode').focus();
                },'json'
            );
        }

    }

    function clearList(){
        $('#barcode').val('').focus();
    }

    function makesession(){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 5; i++ ){
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
    }

});

</script>
