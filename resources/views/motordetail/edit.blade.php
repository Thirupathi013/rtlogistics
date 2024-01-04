@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('motordetail.index')}}" class="btn btn-primary">All Motordetail</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">

                    {!! Form::open(['route' => ['motordetail.update', $motordetail], 'method'=>'put', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Motordetail information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('report_number', 'Report Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('report_number', $motordetail->report_number, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('report_date', 'Report Date', ['class' => 'form-control-label']) }}
                                    {{ Form::text('report_date', $motordetail->report_date, ['class' => 'form-control date-inputmask']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('arrival_date', 'Arrival Date', ['class' => 'form-control-label']) }}
                                    {{ Form::text('arrival_date', $motordetail->arrival_date, ['class' => 'form-control date-inputmask']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('booking_station', 'Booking Station', ['class' => 'form-control-label']) }}
                                    {{-- {{ Form::text('booking_station', $motordetail->report_number, ['class' => 'form-control']) }} --}}
                                    {!! Form::select('booking_station', $bookingstations, $motordetail->booking_station, ['class' => 'form-control select2']) !!}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('destination', 'Destination', ['class' => 'form-control-label']) }}
                                    {{-- {{ Form::text('destination', $motordetail->report_number, ['class' => 'form-control']) }} --}}
                                    {!! Form::select('destination', $destinations, $motordetail->destination, ['class' => 'form-control select2']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('truck_number', 'Enter Truck Number', ['class' => 'form-control-label']) }}
                                    {{-- {{ Form::text('truck_number', $motordetail->report_number, ['class' => 'form-control']) }} --}}
                                    {!! Form::select('truck_number', $driverlist, $motordetail->truck_number, ['class' => 'form-control select2']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('lorry_hire', 'Enter Lorry Hire', ['class' => 'form-control-label']) }}
                                    {{ Form::text('lorry_hire', $motordetail->lorry_hire, ['class' => 'form-control']) }}
                                </div>
                            </div>





                        </div>
                        </div>

                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" value="1" {{$motordetail->status ? 'checked' : ''}}  class="custom-control-input" id="status">
                                        {{ Form::label('status', 'motordetail status', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{ Form::submit('Submit', ['class'=> 'mt-5 btn btn-primary']) }}
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
