@extends('layouts.app')
@section('content')
    <style>
        .table-checkable thead{
            background-color: #2c2e3e;
            color: #fff;
        }
        .table-bordered th, .table-bordered td{
            border:none !important;
        }
    </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <!-- END: Subheader -->
        <div class="m-content">
            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>Well done!</strong>  {{ session()->get('success') }}.
                </div>
            @endif
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                My Artists
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Package</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($myartis))
                            @foreach($myartis as $val)
                                <tr class="row{{$val->id}}">
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>
                                        @if(!empty($val->admin_upgrage))
                                            @switch($val->admin_upgrage)
                                                @case($val->admin_upgrage == "free_booking")
                                                    <span class="m-badge  m-badge--metal m-badge--wide b{{$val->id}}">Free Registration</span>
                                                @break
                                                @case($val->admin_upgrage == "vip_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">VIP Registration</span>
                                                @break
                                                @case($val->admin_upgrage == "elite_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Elite Registration</span>
                                                @break
                                                @case($val->admin_upgrage == "intl_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">INTL Registration</span>
                                                @break
                                                @case($val->admin_upgrage == "tap2020")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Tap2020</span>
                                                @break
                                                @case($val->admin_upgrage == "booking_registration")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Booking registration</span>
                                                @break
                                                @case($val->admin_upgrage == "business_prep")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Business Prep</span>
                                                    @break
                                                @default($val->admin_upgrage == "llc_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Business Registration</span>
                                            @endswitch
                                        @endif

                                        @if(empty($val->admin_upgrage))
                                            @switch($val->booking_type)
                                                @case($val->booking_type == "free_booking")
                                                    <span class="m-badge  m-badge--metal m-badge--wide b{{$val->id}}">Free Registration</span>
                                                @break
                                                @case($val->booking_type == "vip_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">VIP Registration</span>
                                                @break
                                                @case($val->booking_type == "elite_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Elite Registration</span>
                                                @break
                                                @case($val->booking_type == "intl_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">INTL Registration</span>
                                                @break
                                                @case($val->booking_type == "tap2020")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Tap2020</span>
                                                @break
                                                @case($val->booking_type == "booking_registration")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Booking registration</span>
                                                @break
                                                @case($val->booking_type == "business_prep")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Business Prep</span>
                                                @break

                                                @default($val->booking_type == "llc_booking")
                                                    <span class="m-badge  m-badge--success m-badge--wide b{{$val->id}}">Business Registration</span>
                                            @endswitch
                                        @endif
                                    </td>
                                    <td>{{$val->mobile}}</td>
                                    <td>
                                        <a href="{{route('myartist.edit',$val->id)}}"  class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                        <i class="fa flaticon-edit"></i>
                                        </a>

                                        <a href="{{route('myartist.view',$val->id)}}"  class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa flaticon-eye"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{$val->id}}"  class="btn delartist btn-outline-danger m-btn m-btn--icon deluser btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa flaticon-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr><td colspan="6">No Data</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection