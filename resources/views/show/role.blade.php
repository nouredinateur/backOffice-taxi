@extends('layouts.dashboard')

@section('content')
<div class="card card-custom card-stretch" id="kt_page_stretched_card">

    <div class="card-header">
        <!--begin::Symbol-->
        <div class="symbol symbol-40 symbol-light-info p-4">
            <span class="symbol-label">
                <span class="svg-icon svg-icon-lg svg-icon-info">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                            </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </span>
        </div>
        <div class="mr-auto card-title">
            <h3 class="card-label">{{ $role->name }} <small class="ml-2">Role<small> </h3>
        </div>
        <div class="ml-auto p-5">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Assign Permission</button>
        </div>
                

                <!-- Modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Assign Permission</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <form action="{{ route('assignPermission') }}" method="POST" >
                            @csrf
                            <div class="modal-body">
                                <input type="text" name="id" value="{{ $role->id }}" hidden>
                                <input type="text" name="role" value="{{ $role->name }}" hidden>
                                <div class="form-group">
                                    <label>Grant a permission</label>
                                    <div class="radio-inline">          
                                            @foreach ($allperms as $perm)
                                              @if ( !$role->hasPermissionTo($perm->name))
                                                <label class="radio radio-rounded">
                                                    <input type="radio" value="{{ $perm->name }}"  checked="checked" name="permission"/>
                                                    <span></span>
                                                    {{ $perm->name }}
                                                </label>
                                              @endif
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                
    </div>
    <div class="card-body">
             <!--begin::List Widget 11-->
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Permissions</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                @foreach ($permissions as $permission)
                <div class="card-body pt-0">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-success mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{  $permission }}</a>
                             
                        </div>
                        <div class="ml-auto">
                            <div>
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalSizeLg">Revoke Permission</button>
                            </div>
                            <div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warning Role will lose permission</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <h6 class="text-lg-center m-2">This action will remove this permission from the role</h6>
                                        </div>
                                        <form method="POST" action="{{ route('revokePermission') }}">
                                            @csrf 
                                        <div>
                                            <input type="text" name="id" value="{{ $role->id }}" hidden>
                                            <input type="text" name="role" value="{{ $role->name }}" hidden>
                                            <input type="text" name="permission" value="{{ $permission }}" hidden>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger font-weight-bold">Remove Role</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Body-->
            @endforeach
            <!--end::List Widget 11-->
    </div>
</div>
@endsection