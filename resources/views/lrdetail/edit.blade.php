@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('lrdetail.index')}}" class="btn btn-primary">All Lr Details</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">

                    {!! Form::open(['route' => ['lrdetail.update', $lrdetail], 'method'=>'put', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Lr Detail information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('truck_number', 'Enter Truck Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('truck_number', $lrdetail->truck_number, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('report_number', 'Report Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('report_number', $lrdetail->report_number, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('report_date', 'Report Date', ['class' => 'form-control-label']) }}
                                        {{ Form::text('report_date', $lrdetail->report_date, ['class' => 'form-control date-inputmask']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('arrive_number', 'Arrive No', ['class' => 'form-control-label']) }}
                                        {{ Form::text('arrive_number', $lrdetail->arrive_number, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('arrive_date', 'Arrive Date', ['class' => 'form-control-label']) }}
                                        {{ Form::text('arrive_date', $lrdetail->arrive_date, ['class' => 'form-control date-inputmask']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('booking_station_id', 'Booking Station', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('booking_station_id', $lrdetail->truck_number, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('booking_station_id', $bookingstations, $lrdetail->booking_station_id, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('destination_id', 'Destination', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('destination_id', $lrdetail->truck_number, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('destination_id', $destinations, $lrdetail->destination_id, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('article', 'Article', ['class' => 'form-control-label']) }}
                                        {{ Form::text('article', $lrdetail->article, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('description_id', 'Description', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('description_id', $lrdetail->truck_number, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('description_id', $descriptions, $lrdetail->description_id, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('consignee_id', 'Select Consignee', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('consignee_id', $lrdetail->truck_number, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('consignee_id', $partydetails, $lrdetail->consignee_id, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('pvt_mark', 'Enter Pvt Mark', ['class' => 'form-control-label']) }}
                                        {{ Form::text('pvt_mark', $lrdetail->pvt_mark, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('weight', 'Weight', ['class' => 'form-control-label']) }}
                                        {{ Form::text('weight', $lrdetail->weight, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('lr_pay_status', 'Enter Pay Ind', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('lr_pay_status', $lrdetail->truck_number, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('lr_pay_status', $partypaymenttype, $lrdetail->lr_pay_status, ['class' => 'form-control select2']) !!}

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('topay_value', 'Enter Topay Value', ['class' => 'form-control-label']) }}
                                        {{ Form::text('topay_value', $lrdetail->topay_value, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="status" value="1" {{$lrdetail->status ? 'checked' : ''}}  class="custom-control-input" id="status">
                                            {{ Form::label('status', 'Lr status', ['class' => 'custom-control-label']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{ Form::submit('Submit', ['class'=> 'btn btn-primary']) }}
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
