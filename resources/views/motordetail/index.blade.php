@extends('layouts.app')
@push('pg_btn')
@can('create-motordetail')
    <a href="{{ route('motordetail.create') }}" class="btn btn-primary">Create New Motordetail</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Motordetails</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'motordetail.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search Motordetail']) }}
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
                                    <th scope="col" class="text-white">Report Number</th>
                                    <th scope="col" class="text-white">Report Date</th>
                                    <th scope="col" class="text-white">Arrival Date</th>
                                    <th scope="col" class="text-white">Booking Station</th>
                                    <th scope="col" class="text-white">Destination</th>
                                    <th scope="col" class="text-white">Truck Number</th>
                                    <th scope="col" class="text-white">Lorry Hire</th>

                                    <th scope="col" class="text-white">Status </th>

                                    <th scope="col" class="text-white text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($motordetails as $motordetail)
                                    <tr>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$loop->iteration}}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->report_number }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->report_date }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->arrival_date }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->bookingstation->bs_name }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->destination_list->destination_name }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->driver->vehicle_number }}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$motordetail->lorry_hire }}
                                            </div>
                                        </td>


                                        <td>
                                            @if($motordetail->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @can('destroy-motordetail')
                                            {!! Form::open(['route' => ['motordetail.destroy', $motordetail],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-motordetail')
                                            {{-- <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit post details" href="{{route('motordetail.show', $motordetail)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a> --}}
                                            @endcan
                                            @can('update-motordetail')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit post details" href="{{route('motordetail.edit',$motordetail)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            @endcan
                                            @can('destroy-motordetail')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete Motordetail" href="">
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
                                        {{$motordetails->links()}}
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
