@extends('layouts.company-app')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('company/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Notification Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Notification List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
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
                            <a href="{{ url('company/notification') }}"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Notification
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($notifications as $notification)
                                        @php
                                            $status = $notification->status == 1 ? 'Active' : 'InActive';
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $notification->title }}</td>
                                            <td><?php echo $notification->description; ?></td>
                                            <td>{{ $status }}</td>

                                            <td class="action_td">
                                                <div class="form-button-action">
                                                    <a href="{{ url('company/edit_notification/' . $notification->id) }}"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>

                                                    </a>
                                                    @php
                                                        $status = @$notification->status == 1 ? '0' : '1';
                                                        $statusicon = @$notification->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$notification->status == 1 ? 'InActive' : 'Active';
                                                    @endphp

                                                    <a href="{{ url('company/NotificationChangeStatus/' . $notification->id . '/' . $status) }}"
                                                        onclick="return confirm('Are you sure to change status?')"
                                                        data-toggle="tooltip" title=""
                                                        class="btn-link {{ $statusicon }}"
                                                        data-original-title="{{ $statustite }}">
                                                        @if ($notification->status == 0)
                                                            <i class="fa fa-check"></i>
                                                        @else
                                                            <i class="fa fa-times"></i>
                                                        @endif
                                                    </a>
                                                    <a href="{{ url('company/delete_notification/' . $notification->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this notification ?')"
                                                        data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                        data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    </a>
                                                </div>
                                            </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
