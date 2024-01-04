@extends('layouts.app')
@push('pg_btn')
@can('create-lrdetail')
    {{-- <a href="{{ route('lrdetail.create') }}" class="btn btn-primary">Create Lr Details</a> --}}
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Lr Details</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'lrdetail.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search Destination']) }}
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
                                    <th scope="col" class="text-white">Lr Number</th>
                                    <th scope="col" class="text-white">Lr Date </th>
                                    <th scope="col" class="text-white">Booking Station </th>
                                    <th scope="col" class="text-white">Destination </th>
                                    <th scope="col" class="text-white">Report No </th>
                                    <th scope="col" class="text-white">Report Date </th>
                                    <th scope="col" class="text-white">status </th>

                                    <th scope="col" class="text-white text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($lrdetails as $lrdetail)
                                    <tr>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$loop->iteration}}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$lrdetail->lr_number }}
                                            </div>
                                        </td>
                                        <td class="budget">
                                            {{$lrdetail->lr_date}}
                                        </td>
                                        <td class="budget">
                                            {{$lrdetail->booking_station_id}}
                                        </td>
                                        <td class="budget">
                                            {{$lrdetail->destination_id}}
                                        </td>
                                        <td class="budget">
                                            {{$lrdetail->report_number}}
                                        </td>
                                        <td class="budget">
                                            {{$lrdetail->report_date}}
                                        </td>
                                        <td>
                                            @if($lrdetail->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @can('destroy-lrdetail')
                                            {!! Form::open(['route' => ['lrdetail.destroy', $lrdetail],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-lrdetail')
                                            <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit Lr details" href="{{route('lrdetail.show', $lrdetail)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a>
                                            @endcan
                                            @can('update-lrdetail')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit Lr details" href="{{route('lrdetail.edit',$lrdetail)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            @endcan
                                            @can('destroy-lrdetail')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete party" href="">
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
                                        {{$lrdetails->links()}}
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
