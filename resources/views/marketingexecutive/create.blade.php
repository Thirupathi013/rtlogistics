@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('marketingexecutive.index')}}" class="btn btn-primary">All Marketing Executives</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'marketingexecutive.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Marketing Executive information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('me_name', 'Marketing Executive Name', ['class' => 'form-control-label']) }}
                                        {{ Form::text('me_name', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('me_email', 'Email', ['class' => 'form-control-label']) }}
                                        {{ Form::text('me_email', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('me_mobile', 'Mobile Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('me_mobile', null, ['class' => 'form-control']) }}
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
