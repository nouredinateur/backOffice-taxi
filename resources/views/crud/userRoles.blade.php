@extends('layouts.dashboard')

@section('content')

@can('delete-users')
        	<!--begin::List Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">USERS</h3>
                    <div class="card-toolbar">
                      
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    @foreach ($users as $user)
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-success mr-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/avatars/009-boy-4.svg" class="h-75 align-self-end" alt="" />
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $user->name }}</a>
                            <span class="text-muted">
                                {{
                                     $user->getRoleNames();
                                }}
                            </span>
                        </div>
                        <div>
                            <div class="ml-auto p-5">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Assign Role</button>
                            </div>
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
                                                    
                                                        <div class="modal-body">
                                    
                                                                @if (!$user->hasRole( $user->getRoleNames()))
                                                                <div class="checkbox-inline">
                                                                    <label class="checkbox checkbox-lg">
                                                                        {{-- <input type="checkbox" value="{{ $role->name }}" {{ in_array($role->name, old('role', [])) ? 'checked' : '' }} name="role[]"/>
                                                                        <span></span>
                                                                        {{ $role->name }} --}}
                                                                    </label>
                                                                </div>
                                                                @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
         
                    </div>
                    @endforeach

                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 3-->
@endcan

@endsection