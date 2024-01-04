@extends('layouts.app')
@push('pg_btn')
@can('create-bookingstation')
    <a href="{{ route('bookingstation.create') }}" class="btn btn-primary">Create New Booking Station</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Booking Stations</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'bookingstation.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search Booking Station']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="bg-primary text-white text-bold">
                                <tr class="text-white">
                                    <th scope="col" class="text-white">S.No</th>
                                    <th scope="col" class="text-white">Booking Station Name</th>
                                    <th scope="col" class="text-white">Main Station </th>
                                    <th scope="col" class="text-white">Short Form </th>
                                    <th scope="col" class="text-white">Status </th>

                                    <th scope="col" class="text-white text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($bookingstations as $bookingstation)
                                    <tr>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$loop->iteration}}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$bookingstation->bs_name }}
                                            </div>
                                        </td>
                                        <td class="budget">
                                            {{$bookingstation->main_station}}
                                        </td>
                                        <td class="budget">
                                            {{$bookingstation->short_name}}
                                        </td>
                                        <td>
                                            @if($bookingstation->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @can('destroy-bookingstation')
                                            {!! Form::open(['route' => ['bookingstation.destroy', $bookingstation],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-bookingstation')
                                            {{-- <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit booking Station details" href="{{route('bookingstation.show', $bookingstation)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a> --}}
                                            @endcan
                                            @can('update-bookingstation')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit booking Station details" href="{{route('bookingstation.edit',$bookingstation)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            @endcan
                                            @can('destroy-bookingstation')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete Booking Station" href="">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$bookingstations->links()}}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function(){
            $('.delete').on('click', function(e){
                e.preventDefault();
                let that = jQuery(this);
                jQuery.confirm({
                    icon: 'fas fa-wind-warning',
                    closeIcon: true,
                    title: 'Are you sure!',
                    content: 'You can not undo this action.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: function () {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        cancel: function () {
                            //$.alert('Canceled!');
                        }
                    }
                });
            })
        })

    </script>
@endpush
