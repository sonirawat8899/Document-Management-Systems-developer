@extends('layouts.admin-app')
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('admin/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">User List</a>
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
                            <a href="{{ url('admin/adduser') }}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add User
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> S. No</th>
                                        <th> Name</th>
                                        <th>Company Name</th>
                                        <th> Email </th>
                                        <th> Mobile </th>
                                        <th> Status</th>
                                        <th> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $users)
                                        @php
                                            $status = $users->status == 1 ? 'Active' : 'InActive';
                                        @endphp
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                            <td> {{ $users->name }}</td>
                                            <td> {{ $users->company_name }}</td>
                                            <td> {{ $users->email }}</td>
                                            <td> {{ $users->mobile }}</td>
                                            <td>{{ $status }}</td>
                                            <td class="action_td">
                                               
                                                    <a href='/admin/edit_user/{{ $users->id }}' data-toggle="tooltip" title=""
                                                            class="btn-link btn-primary" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                    </a>
                                                    @php
                                                        $status = @$users->status == 1 ? '0' : '1';
                                                        $statusicon = @$users->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$users->status == 1 ? 'InActive' : 'Active';
                                                    @endphp 
                                                                                             
                                                     <a href="{{url('UserChangeStatus/'. $users->id.'/'. $status) }}"
                                                        onclick="return confirm('Are you sure to change status?')"   data-toggle="tooltip" title=""
                                                            class="btn-link {{$statusicon}}" data-original-title="{{$statustite}}">
                                                            @if($users->status==0)
                                                            <i class="fa fa-check"></i>
                                                            @else
                                                            <i class="fa fa-times"></i>
                                                            @endif
                                                    </a>
                                                    <a href="/admin/delete_user/{{ $users->id }}"
                                                        onclick="return confirm('Are you sure you want to delete this user ?')"  data-toggle="tooltip" title=""
                                                            class="btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-trash"></i>
                                                    </a>
                                             
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
