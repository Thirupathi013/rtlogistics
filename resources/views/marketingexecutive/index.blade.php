@extends('layouts.app')
@push('pg_btn')
@can('create-marketingexecutive')
    <a href="{{ route('marketingexecutive.create') }}" class="btn btn-primary">Create New Marketing Executive</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">All Marketing Executives</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'marketingexecutive.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search Marketing Executives']) }}
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
                                    <th scope="col" class="text-white">Marketing Executive Name</th>
                                    <th scope="col" class="text-white">Email </th>
                                    <th scope="col" class="text-white">Phone </th>
                                    <th scope="col" class="text-white">Status </th>

                                    <th scope="col" class="text-white text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($marketingexecutives as $marketingexecutive)
                                    <tr>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$loop->iteration}}
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$marketingexecutive->me_name }}
                                            </div>
                                        </td>
                                        <td class="budget">
                                            {{$marketingexecutive->me_email}}
                                        </td>
                                        <td class="budget">
                                            {{$marketingexecutive->me_mobile}}
                                        </td>
                                        <td>
                                            @if($marketingexecutive->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @can('destroy-marketingexecutive')
                                            {!! Form::open(['route' => ['marketingexecutive.destroy', $marketingexecutive],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-marketingexecutive')
                                            {{-- <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="View and edit post details" href="{{route('marketingexecutive.show', $marketingexecutive)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a> --}}
                                            @endcan
                                            @can('update-marketingexecutive')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit post details" href="{{route('marketingexecutive.edit',$marketingexecutive)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            @endcan
                                            @can('destroy-marketingexecutive')
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
                                        {{$marketingexecutives->links()}}
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
