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
                    <a href="#">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"> Project List</a>
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
                            <a href="{{ url('admin/project') }}"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Project
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> S.NO</th>
                                        <th> Project Name</th>
                                        <th> Project Description</th>
                                        <th> Manager Name </th>
                                        <th> Status</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project )
                                    @php
                                    $status = $project->status == 1 ? 'Active' : 'InActive';
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td> {{$project->project_name}}</td>
                                        <td><?php echo $project->description ?></td>
                                        <td> {{$project->name}}</td>
                                        <td> {{$status}}</td>

                                        <td class="action_td">
                                            <a href="{{ url('/admin/update_project/' .$project->id) }}"
                                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Edit">
                                                <i class="fa fa-edit">
                                                </i>
                                                </button>
                                            </a>


                                            @php
                                            $status = @$project->status == 1 ? '0' : '1';
                                            $statusicon = @$project->status == 1 ? 'btn-danger' : 'btn-success';

                                            $statustite = @$project->status == 1 ? 'InActive' : 'Active';
                                            @endphp


                                            <a href="{{url('/ProjectChangeStatus/'. $project->id.'/'. $status) }}"
                                                onclick="return confirm('Are you sure to change status?')"
                                                data-toggle="tooltip" title="" class="btn-link {{$statusicon}}"
                                                data-original-title="{{$statustite}}">
                                                @if($project->status==0)
                                                <i class="fa fa-check"></i>
                                                @else
                                                <i class="fa fa-times"></i>
                                                @endif
                                            </a>
                                            <a href="{{ url('admin/delete_project/' .$project->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this project ?')"
                                                data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                data-original-title="Remove">
                                                <i class="fa fa-trash"></i>

                                            </a>


                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endsection