@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('partydetail.index')}}" class="btn btn-primary">All Parties List</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'partydetail.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Party information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_gstno', ' GSTIN Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_gstno', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        {{ Form::label('party_name', ' Party Name', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_name', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_add1', ' Address1', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_add1', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_add2', ' Address2', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_add2', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_email', ' Email', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_email', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_phoneno', ' Phone Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_phoneno', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_c_person', 'Contact Person Name', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_c_person', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_mobile', 'Mobile Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('party_mobile', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('party_payment_type', ' Payment Type', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('party_payment_type', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('party_payment_type', $partypaymenttype, null, ['class' => 'form-control']) !!}


                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('marketing_executive_id', 'Party By-Comp/Mrkt Exec', ['class' => 'form-control-label']) }}
                                        {{-- {{ Form::text('marketing_executive_id', null, ['class' => 'form-control']) }} --}}
                                        {!! Form::select('marketing_executive_id', $marketingexecutives, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>






                            </div>
                            </div>

                        </div>



                            <div class="row">

                                <div class="col-md-12">
                                    {{ Form::submit('Submit', ['class'=> 'mx-5 my-5 btn btn-primary']) }}
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
