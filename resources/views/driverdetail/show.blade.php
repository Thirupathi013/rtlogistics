@extends('layouts.app')
@push('pg_btn')
    @can('update-driverdetail')
       <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit driverdetail details" href="{{route('driverdetail.edit',$driverdetail)}}">
            <i class="fa fa-edit" aria-hidden="true"></i> Edit Party
        </a> 
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1">
                            Party Name
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $driverdetail->driver_name }}</strong>
                        </div>

                    </div>
                   


                    <div class="row">
                        <div class="col-sm-1">
                            Status
                        </div>
                        <div class="col-sm-3">
                            {{ $driverdetail->status ? 'Active' : 'Disable'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
