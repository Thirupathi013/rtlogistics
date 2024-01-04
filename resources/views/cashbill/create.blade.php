@extends('layouts.app')
@push('pg_btn')
    {{-- <a href="{{route('cashbill.index')}}" class="btn btn-primary">All Cash Bills</a> --}}
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'cashbill.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Cash Bill information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('lr_number', 'Select Lr Details', ['class' => 'form-control-label']) }}
                                        {!! Form::select('lr_number', $lrdetails, null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group"><br>
                                       <button class="btn btn-primary fetchlr" type="button">Add</button>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                <table class="table table-bordered table-condensed" id='lrdetailtable' >
                                    <thead class="bg-primary text-white text-bold">
                                <tr class="text-white">
                                    <th scope="col" class="text-white">S.No</th>
                                    <th scope="col" class="text-white">Lr Number</th>
                                    <th scope="col" class="text-white">Bkg Date </th>
                                    <th scope="col" class="text-white">Bkg </th>
                                    <th scope="col" class="text-white">Dest </th>
                                    <th scope="col" class="text-white">Article </th>
                                    <th scope="col" class="text-white">Weight </th>
                                    <th scope="col" class="text-white">P.mode </th>
                                    <th scope="col" class="text-white">Amount </th>
                                    <th scope="col" class="text-white">Action </th>


                                </tr>
                                </thead>
                                    <tbody id='lrdataappend'>
                                      {{-- <tr>
                                        <td scope="col" >S.No</td>
                                    <td scope="col" >Lr Number</td>
                                    <td scope="col" >Bkg Date </td>
                                    <td scope="col" >Bkg </td>
                                    <td scope="col" >Dest </td>
                                    <td scope="col" >Article </td>
                                    <td scope="col" >Weight </td>
                                    <td scope="col" >P.mode </td>
                                    <td scope="col" >Amount </td>
                                    <td scope="col" >Action </td>
                                      </tr> --}}

                                    </tbody>
                                </table>
                                </div>
                                <div class="col-md-3">


                                    <div class="row">

                                            {{ Form::label('door_open', 'Door Open', ['class' => 'col-sm-4 col-form-label']) }}
                                            <div class="col-sm-8">
                                            {{ Form::text('door_open', null, ['class' => 'form-control mb-4']) }}
                                        </div>
                                    </div>
                                    <div class="row">

                                            {{ Form::label('hamali', 'Hamali', ['class' => 'col-sm-4 col-form-label']) }}
                                            <div class="col-sm-8">
                                            {{ Form::text('hamali', null, ['class' => 'form-control mb-4']) }}
                                        </div>
                                    </div>
                                    <div class="row">

                                            {{ Form::label('salestax', 'Sales Tax', ['class' => 'col-sm-4 col-form-label']) }}
                                            <div class="col-sm-8">
                                            {{ Form::text('salestax', null, ['class' => 'form-control mb-4']) }}
                                        </div>
                                    </div>
                                    <div class="row">

                                            {{ Form::label('door_delivery', 'Door Delivery', ['class' => 'col-sm-4 col-form-label']) }}
                                            <div class="col-sm-8">
                                            {{ Form::text('door_delivery', null, ['class' => 'form-control mb-4']) }}
                                        </div>
                                    </div>
                                    <div class="row">

                                            {{ Form::label('total_amount', 'Total Amount', ['class' => 'col-sm-4 col-form-label']) }}
                                            <div class="col-sm-8">
                                            {{ Form::text('total_amount', null, ['class' => 'form-control mb-4']) }}
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('delivered_to_id', 'Delivered to ', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('delivered_to_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('delivered_to_id', $partydetails, null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('delivered_by', 'Delivered by ', ['class' => 'form-control-label']) }}
                                        {{ Form::text('delivered_by', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('delivered_taken_id', 'Delivered Taken by ', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('delivered_taken_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('delivered_taken_id', $driverdetails, null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('payment_type', 'Payment Type ', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('payment_type', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('payment_type', $partypaymenttype, null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('print_type', 'Do you want to Print?', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('print_type', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('print_type', $print_types, null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                {{ Form::submit('Submit', ['class'=> ' btn btn-primary']) }}
                            </div>

                            </div>





                        </div>





                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        var lrcount = 1;
        var max_fields      = 6; //maximum input boxes allowed
        jQuery('#summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]

        });
        jQuery('#uploadFile').filemanager('file');



        $('.fetchlr').on('click',function(){
            var lr_number = $('#lr_number').val();

            if(lr_number==''){
                alert('please Enter Lr Number');
            }else{

                if(lrcount < max_fields){ //max input box allowed

                jQuery.ajax({
              url: '/cashbill/fetchlrdata',
              type: "Get",
              dataType: 'json',//this will expect a json response
              data:{id:lr_number},
               success: function(response){

                    // $("#inputfieldid1").val(response.id);
                    $("#lrdataappend").append('<tr id="'+response.id+'"><td scope="col" >'+lrcount+'<input type="hidden" id="lrids'+response.id+'" name="lrids[]" style="width:50px" class="form-control" value='+response.id+'></td> <td scope="col" >'+response.lr_number+'</td><td scope="col" >'+response.lr_date+'  </td><td scope="col" >'+response.booking_station_id+' </td><td scope="col" >'+response.destination_id+' </td><td scope="col" ><input type="text" id="lrarticle'+response.id+'" name="lrarticle[]" style="width:50px" class="form-control" value='+response.article+'> </td><td scope="col" ><input type="text" id="lrweight'+response.id+'" name="lrweight[]" style="width:50px" class="form-control" value='+response.weight+'></td><td scope="col" ><select class="form-control select2" id="lr_pay_status'+response.id+'" name="lr_pay_status[]" ><option value="" >Please Select</option><option value="0" >To pay</option><option value="1">Paid</option><option value="2">Tobe Billed</option><option value="3">FOC</option></select> </td><td scope="col" ><input type="text" id="lrtopay'+response.id+'" name="lrtopay[]" style="width:50px" class="form-control" value='+response.topay_value+'> </td><td style="width:100px;padding:10px"><button type="button" onclick="updateRow('+response.id+')" class="btn btn-success btn-sm updatelr " style="margin-right:3px"><i class="me-2 mdi mdi-update"></i></button><button type="button" onclick="deleteRow('+response.id+')" class="btn btn-danger btn-sm deletelr"><i class="me-2 mdi mdi-delete"></i></button></td>'); //add input box
                        lrcount++; //text box increment
                        let lrpaystatus_name ='#lr_pay_status'+response.id;
                    $(lrpaystatus_name).val(response.lr_pay_status);



                }
                    });

                }else{
                    alert('No more adding')
                }


            }
        })
    });
    function deleteRow(lrid){ //user click on remove text
        $('table#lrdetailtable tr#'+lrid).remove();
        lrcount--;

    }
    function updateRow(lrid){
        var lrarticle = $('#lrarticle'+lrid).val();
        var lrweight = $('#lrweight'+lrid).val();
        var lr_pay_status = $('#lr_pay_status'+lrid).val();
        var lrtopay = $('#lrtopay'+lrid).val();

        jQuery.ajax({
              url: '/cashbill/updatelrdata',
              type: "Get",
              dataType: 'json',//this will expect a json response
              data:{id:lrid,lrarticle:lrarticle,lrweight:lrweight,lr_pay_status:lr_pay_status,lrtopay:lrtopay},
               success: function(response){
                if(response.trim()=="SUCCESS"){
                    alert('lr Updated Successfully')

                }else{
                    alert('lr Updation Failed')
                }

                }
                    });

    }
  </script>
@endpush
