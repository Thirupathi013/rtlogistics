@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('partydetail.index')}}" class="btn btn-primary">Party information</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">

                    {!! Form::open(['route' => ['partydetail.update', $partydetail], 'method'=>'put', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">partydetail information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_gstno', ' GSTIN Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_gstno', $partydetail->party_gstno, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    {{ Form::label('party_name', ' Party Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_name', $partydetail->party_name, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_add1', ' Address1', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_add1', $partydetail->party_add1, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_add2', ' Address2', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_add2', $partydetail->party_add2, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_email', ' Email', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_email', $partydetail->party_email, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_phoneno', ' Phone Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_phoneno', $partydetail->party_phoneno, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_c_person', 'Contact Person Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_c_person', $partydetail->party_c_person, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_mobile', 'Mobile Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('party_mobile', $partydetail->party_mobile, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('party_payment_type', ' Payment Type', ['class' => 'form-control-label']) }}
                                    {{-- {{ Form::text('party_payment_type', $partydetail->party_gstno, ['class' => 'form-control']) }} --}}
                                    {!! Form::select('party_payment_type', $partypaymenttype, $partydetail->party_payment_type, ['class' => 'form-control']) !!}


                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('marketing_executive_id', 'Party By-Comp/Mrkt Exec', ['class' => 'form-control-label']) }}
                                    {{-- {{ Form::text('marketing_executive_id', $partydetail->party_gstno, ['class' => 'form-control']) }} --}}
                                    {!! Form::select('marketing_executive_id', $marketingexecutives, $partydetail->marketing_executive_id, ['class' => 'form-control']) !!}
                                </div>
                            </div>






                        </div>
                        </div>

                    </div>

                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" value="1" {{$partydetail->status ? 'checked' : ''}}  class="custom-control-input" id="status">
                                        {{ Form::label('status', 'partydetail status', ['class' => 'custom-control-label']) }}
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
