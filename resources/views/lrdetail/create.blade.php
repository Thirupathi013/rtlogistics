@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('lrdetail.index')}}" class="btn btn-primary">All Lr Details</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'lrdetail.store', 'files' => true,'id'=>'myForm',]) !!}
                    {{-- <input type="hidden" name="md_id" value="{{ app('request')->input('motorid') }}" /> --}}
                    {{ Form::hidden('md_id',  app('request')->input('motorid') ) }}

                    <h6 class="heading-small text-muted mb-4">LR information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('truck_number', 'Enter Truck Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('truck_number', null, ['class' => 'form-control','autofocus'=>true]) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('report_number', 'Report Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('report_number', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('report_date', 'Report Date', ['class' => 'form-control-label']) }}
                                        {{ Form::text('report_date', null, ['class' => 'form-control date-inputmask']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('arrive_number', 'Arrive No', ['class' => 'form-control-label']) }}
                                        {{ Form::text('arrive_number', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('arrive_date', 'Arrive Date', ['class' => 'form-control-label']) }}
                                        {{ Form::text('arrive_date', null, ['class' => 'form-control date-inputmask']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('booking_station_id', 'Booking Station', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('booking_station_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('booking_station_id', $bookingstations, null, ['class' => 'form-control ']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('destination_id', 'Destination', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('destination_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('destination_id', $destinations, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('article', 'Article', ['class' => 'form-control-label']) }}
                                        {{ Form::text('article', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('description_id', 'Description', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('description_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('description_id', $descriptions, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('consignee_id', 'Select Consignee', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('consignee_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('consignee_id', $partydetails, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('pvt_mark', 'Enter Pvt Mark', ['class' => 'form-control-label']) }}
                                        {{ Form::text('pvt_mark', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('weight', 'Weight', ['class' => 'form-control-label']) }}
                                        {{ Form::text('weight', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('lr_pay_status', 'Enter Pay Ind', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('lr_pay_status', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('lr_pay_status', $partypaymenttype, null, ['class' => 'form-control']) !!}

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('topay_value', 'Enter Topay Value', ['class' => 'form-control-label']) }}
                                        {{ Form::text('topay_value', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        {{ Form::submit('Submit', ['class'=> ' btn btn-primary']) }}
                                    </div>
                                </div>





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
    });
  </script>
@endpush
