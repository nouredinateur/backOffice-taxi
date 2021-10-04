@extends('layouts.dashboard')

@section('content')

@can('dashboard')
<div class="flex justify-between">
    <div class="h-full w-2/5 mx-8">
        <div class="card-header">
         <h3 class="card-title">
          Add New Roles
         </h3>
           <!--begin::Form-->
            <form action="{{ route('roles.store') }}" method="POST" class="form">
            @csrf 
            <div class="card-body">
             <div class="form-group">
              <label>Role Name</label>
              <input type="text" name="role" value="{{ old('role') }}" class="form-control form-control-solid" placeholder="Role"/>
                @error('role')
                    <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                @enderror
                <div class="mt-4">
                    <div class="form-group">
                        <label>Assign Permissions to the role</label>
                        @foreach ($permissions as $permission)
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox" value="{{ $permission->name }}" {{ in_array($permission->name, old('permission', [])) ? 'checked' : '' }} name="permission[]"/>
                                <span></span>
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                        @error('permission')
                            <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              <div class="mt-4 h-4">
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </div>
             </div>
            </div>
           </form>
           <!--end::Form-->
        </div>
        {{-- <div class="mt-8 card-header">
            <h3 class="card-title">
             Add New Permissions
            </h3>
              <!--begin::Form-->
               <form class="form">
               <div class="card-body">
                <div class="form-group">
                 <label>Permission Name</label>
                 <input type="text" class="form-control form-control-solid" placeholder="Permission"/>
                 <div class="mt-4 h-4">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 </div>
                </div>
               </div>
              </form>
              <!--end::Form-->
        </div>       --}}
    </div>
    <!--begin::List Widget 1-->
<div class=" card card-custom card-stretch gutter-b w-4/5">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Roles Overview</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">list of existing roles</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-8">
        <!--begin::Item-->
        @foreach ($roles as $role)
        <div class="d-flex align-items-center mb-2">
            <div class="">
            <!--begin::Symbol-->
            <div class="symbol symbol-40 symbol-light-info mr-5">
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
            <!--end::Symbol-->
                
            </div>
            <!--begin::Text-->
            <div class="d-flex flex-column font-weight-bold">
                @if($role->name != "Super-Admin")
                <a  href="{{ route('roles.show' ,  $role->id )}}"  class="text-dark text-hover-primary mb-1 font-size-lg ">{{ $role->name }}</a>
                @else
                <a  href="{{ route('roles.show' ,  $role->id )}}"  class="text-danger text-hover-primary mb-1 font-size-lg ">{{ $role->name }}</a>
                <span class="text-muted -mt-2 font-weight-bold font-size-sm">Protected</span>
                @endif 
            </div>
            <div class="ml-auto">
                
                @if($role->name != "Super-Admin")
                <form method="POST" action="{{ route('roles.destroy' ,  $role->id )}}">
                    @csrf
                    @method('DELETE')
                <div>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
                </form>
                @endif   
            </div>
             <!-- Modal-->
            {{-- <div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('roles.destroy' ,  $role->id )}}">
                            @csrf
                            @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete {{ $role->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="">
                            <span class="mx-auto svg-icon svg-icon-5x svg-icon-danger">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-thunder.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                        <polygon fill="#000000" opacity="0.3" points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            <input type="submit" value="Delete" class="btn btn-danger font-weight-bold">
                        </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            <!--end::Text-->
        </div>
        @endforeach
        <!--end::Item-->
    </div>
    <!--end::Body-->
</div>
{{-- <div class="ml-8 card card-custom card-stretch gutter-b w-3/5">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Roles Overview</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">list of existing roles</span>
        </h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi navi-hover py-5">
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-drop"></i>
                                </span>
                                <span class="navi-text">New Group</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-list-3"></i>
                                </span>
                                <span class="navi-text">Contacts</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-rocket-1"></i>
                                </span>
                                <span class="navi-text">Groups</span>
                                <span class="navi-link-badge">
                                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-bell-2"></i>
                                </span>
                                <span class="navi-text">Calls</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-gear"></i>
                                </span>
                                <span class="navi-text">Settings</span>
                            </a>
                        </li>
                        <li class="navi-separator my-3"></li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-magnifier-tool"></i>
                                </span>
                                <span class="navi-text">Help</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-bell-2"></i>
                                </span>
                                <span class="navi-text">Privacy</span>
                                <span class="navi-link-badge">
                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-8">
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-2">
            <!--begin::Symbol-->
            <div class="symbol symbol-40 symbol-light-info mr-5">
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
            <!--end::Symbol-->
            <!--begin::Text-->
            <div class="d-flex flex-column font-weight-bold">
                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Testing</a>
                <span class="text-muted">QA Managers</span>
            </div>
            <!--end::Text-->
        </div>
        <!--end::Item-->
    </div>
    <!--end::Body-->
</div> --}}
<!--end::List Widget 1-->
</div>
@endcan

@endsection