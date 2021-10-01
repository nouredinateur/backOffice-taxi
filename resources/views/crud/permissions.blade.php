@extends('layouts.dashboard')

@section('content')
@can('dashboard')
<div class="flex justify-between">
    <div class="h-full w-2/5 mx-8">
        <div class="card-header">
         <h3 class="card-title">
          Add New Permission
         </h3>
           <!--begin::Form-->
            <form action="{{ route('permissions.store') }}" method="POST" class="form">
            @csrf 
            <div class="card-body">
             <div class="form-group">
              <label>Permission Name</label>
              <input type="text" name="permission" value="{{ old('permission') }}" class="form-control form-control-solid" placeholder="Permission"/>
                @error('permission')
                    <div class="alert alert-danger p-2 m-2">{{ $message }}</div>
                @enderror
                <div class="mt-4">
                   
                    <div class="form-group">
                        <label>Assign to a role</label>
                        @foreach ($roles as $role)
                            @if ($role->name != "Super-Admin")
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" value="{{ $role->name }}" {{ in_array($role->name, old('role', [])) ? 'checked' : '' }} name="role[]"/>
                                    <span></span>
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endif
                        @endforeach
                        @error('role')
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
</div>
    <!--begin::List Widget 1-->
<div class=" card card-custom card-stretch gutter-b w-4/5">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Permissions Overview</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">list of existing permissions</span>
        </h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor"></i>
                </a>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-8">
        <!--begin::Item-->
        @foreach ($permissions as $permission)
        <div class="d-flex align-items-center mb-2">
            <div class="">
            <!--begin::Symbol-->
            <div class="symbol symbol-40 symbol-light-info mr-5">
                <span class="symbol-label">
                    <span class="svg-icon svg-icon-lg svg-icon-info">
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    </span>
                </span>
            </div>
            <!--end::Symbol-->
                
            </div>
            <!--begin::Text-->
            <div class="d-flex flex-column font-weight-bold">
                @if($permission->name != "dashboard")
                    <a  href="{{ route('permissions.show' ,  $permission->id )}}"  class="text-dark text-hover-primary mb-1 font-size-lg ">{{ $permission->name }}</a>
                @else
                    <a  href="{{ route('permissions.show' ,  $permission->id )}}"  class="text-danger text-hover-primary mb-1 font-size-lg ">{{ $permission->name }}</a>
                <span class="text-muted -mt-2 font-weight-bold font-size-sm">Protected</span>
                @endif 
            </div>
            <div class="ml-auto">
                <div>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalSizeLg">Delete</button>
                </div>
                {{-- <div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            @if($permission->name != "dashboard")
                            <form method="POST" action="{{ route('permissions.destroy' ,  $permission->id )}}">
                                @csrf
                                @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Warning Role will lose permission</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div>
                                <h6 class="text-lg-center m-2">This action will remove this permission from the role</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger font-weight-bold">Remove Role</button>
                            </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end::Text-->
        </div>
        @endforeach
        <!--end::Item-->
    </div>
    <!--end::Body-->
</div>

</div>      	



  <!-- Modal-->
  <div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            @if($permission->name != "dashboard")
                <form method="POST" action="{{ route('permissions.destroy' ,  $permission->id )}}">
                    @csrf
                    @method('DELETE')
                    <div>
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
                            <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

@endcan
@endsection