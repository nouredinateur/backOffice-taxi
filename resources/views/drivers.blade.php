@extends('layouts.dashboard')
@section('content')

<!--begin::Card-->
{{-- <div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-taxi"></i>
            </span>
            <h3 class="card-label">Driver's List</h3>
        </div>
        <div class="card-toolbar">
           
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a href="{{ route('drivers.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="fas fa-plus-circle"></i>New Record</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>CIN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            @foreach ($drivers as $driver)
            <tr>
                <td class="py-14 px-14">{{ $driver->id }}</td>
                <td>
                    <img class="h-28 mx-auto" src=" {{ $driver->avatar }}" alt="">
                </td>
                <td class="py-14"><p>{{ $driver->name }}</p></td>
                <td class="py-14" >{{ $driver->phoneNumber }}</td>
                <td class="py-14">{{ $driver->email }}</td>
                <td class="py-14">{{ $driver->cin }}</td>
                <td class="py-12">
                
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">								
                        <i class="fas fa-cog"></i>			
                    </a>
                     <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">								
                        <i class="fas fa-edit"></i>			
                    </a>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">								
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <!--end: Datatable-->
    </div>
</div> --}}
<!--end::Card-->


	<!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-taxi"></i>
                </span>
                <h3 class="card-label">Driver's List</h3>
            </div>
            <div class="card-toolbar">
           
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="{{ route('drivers.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="fas fa-plus-circle"></i>New Record</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body"> 
            <!--begin: Datatable-->
            <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Country</th>
                        <th>Ship Address</th>
                        <th>Company Name</th>
                        <th>Ship Date</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                {{-- @foreach ($drivers as $driver)
                <tr>
                    <td class="py-14 px-14">{{ $driver->id }}</td>
                    <td>
                        <img class="h-28 mx-auto" src=" {{ $driver->avatar }}" alt="">
                    </td>
                    <td class="py-14"><p>{{ $driver->name }}</p></td>
                    <td class="py-14" >{{ $driver->phoneNumber }}</td>
                    <td class="py-14">{{ $driver->email }}</td>
                    <td class="py-14">{{ $driver->cin }}</td>
                    <td class="py-12">
                    
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">								
                            <i class="fas fa-cog"></i>			
                        </a>
                         <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">								
                            <i class="fas fa-edit"></i>			
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">								
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach --}}
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
@endsection