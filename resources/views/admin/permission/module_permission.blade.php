@extends('layouts.admin-app')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Permission</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Module Permission</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="flash-message">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex align-items-center">
                                <a><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addRowModal">
                                        <i class="fa fa-show"></i>
                                        Module Permission
                                    </button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <form action="{{ url('/admin/module_permission') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h2>User:</h2>
                                        </div>
                                        <div>
                                            <select name="user_id" class="form-control input-solid">

                                                <option value="">Please Select</option>
                                                @foreach ($modules as $modules)
                                                    <option value="{{ $modules->id }}">{{ $modules->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <table id="" class="display table table-striped table-hover">

                                        <thead>
                                            <tr>
                                                <th>Module Id</th>
                                                <th>Module Name</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Change Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $users)

                                                <tr>
                                                    <td> {{ $users->id }}</td>
                                                    <td> {{ $users->module_name }}</td>
                                                    <input type="hidden" name="id[]" value="{{ $users->id }}">
                                                    
                                                    <td>
                                                        <input class="form-check-input permission viewall-{{ $users->id }}" type="checkbox"  data-view="view-{{ $users->id }}"  
                                                            name="permission[{{ $users->id }}][add_permission]"
                                                             id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-{{ $users->id }}" type="checkbox"  data-view="view-{{ $users->id }}" 
                                                            name="permission[{{ $users->id }}][edit_permission]"
                                                            id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-{{ $users->id }} " type="checkbox"  data-view="view-{{ $users->id }}" 
                                                            name="permission[{{ $users->id }}][delete_permission]"
                                                            id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-{{ $users->id }}" type="checkbox"  data-view="view-{{ $users->id }}"  type="checkbox"
                                                            name="permission[{{ $users->id }}][status_permission]"
                                                           id=""/>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input view_assumption view-{{ $users->id }}" type="checkbox" data-subfield="viewall-{{ $users->id }}"
                                                        data-id="{{ $users->id }}"
                                                            name="permission[{{ $users->id }}][view_permission]"
                                                             id="" />
                                                    </td>
                                                      
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                        <a href="{{ url('admin/module_permission') }}"
                                            class="mt-4 btn btn-danger">Cancel</a>
                                        <div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $('.permission').on('click', function(){
            var view = $(this).data('view');
             $( "."+view ).prop( "checked", true );
        });

    $('.view_assumption').on('click', function(){

        var view = $(this).data('id');
            if (!$(".view-"+view).is(':checked')) {
                var view = $(".view-"+view).data('subfield');
                     $( "."+view ).prop( "checked", false ); 
            }
        });
  </script>
    
@endsection


 
 