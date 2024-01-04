@extends('layouts.app')
@push('pg_btn')
    @can('update-destination')
        <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit Destination details" href="{{route('destination.edit',$destination)}}">
            <i class="fa fa-edit" aria-hidden="true"></i> Edit Destination
        </a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            Destination Name
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $destination->destination_name }}</strong>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                           Main Station
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $destination->main_station }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                           Short Name
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $destination->short_name }}</strong>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-3">
                            Status
                        </div>
                        <div class="col-sm-3">
                            {{ $destination->status ? 'Active' : 'Disable'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
