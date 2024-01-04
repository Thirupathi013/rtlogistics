@extends('layouts.app')
@push('pg_btn')
    @can('update-lrdetail')
       <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Edit lrdetail details" href="{{route('lrdetail.edit',$lrdetail)}}">
            <i class="fa fa-edit" aria-hidden="true"></i> Edit Party
        </a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-bordered ">

                        <tbody>
                          <tr>
                            <td class="col-md-4">Lr Number</td>
                            <td class="col-md-8">{{ $lrdetail->lr_number }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Lr Date</td>
                            <td class="col-md-8">{{ $lrdetail->lr_date }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Truck Number</td>
                            <td class="col-md-8">{{ $lrdetail->truck_number }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Report Number</td>
                            <td class="col-md-8">{{ $lrdetail->report_number }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Report Date</td>
                            <td class="col-md-8">{{ $lrdetail->report_date }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Arrive Number</td>
                            <td class="col-md-8">{{ $lrdetail->arrive_number }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Arrive Date</td>
                            <td class="col-md-8">{{ $lrdetail->arrive_date }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Booking Station</td>
                            <td class="col-md-8">{{ $lrdetail->bookingstation->bs_name  }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Destination</td>
                            <td class="col-md-8">{{ $lrdetail->destination->destination_name }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Article</td>
                            <td class="col-md-8">{{ $lrdetail->article }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Description</td>
                            <td class="col-md-8">{{ $lrdetail->description->description }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Party</td>
                            <td class="col-md-8">{{ $lrdetail->partydetail->party_gstno }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Pvt Mark</td>
                            <td class="col-md-8">{{ $lrdetail->pvt_mark }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Weight</td>
                            <td class="col-md-8">{{ $lrdetail->weight	 }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Lr Pay Ind</td>
                            <td class="col-md-8">{{ $lrdetail->lr_pay_status }}</td>
                          </tr>
                          <tr>
                            <td class="col-md-4">Lr Topay Value</td>
                            <td class="col-md-8">{{ $lrdetail->topay_value }}</td>
                          </tr>

                          <tr>
                            <td class="col-md-4">Status</td>
                            <td class="col-md-8">{{ $lrdetail->status ? 'Active' : 'Disable'}}</td>
                          </tr>

                        </tbody>
                      </table>




                </div>
            </div>
        </div>
    </div>
@endsection
