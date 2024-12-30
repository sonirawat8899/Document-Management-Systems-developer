@extends('layouts.user-app')
@section('content')
    <?php
    use app\Models\User;
    ?>


    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('user/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Email Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Add Email Content</a>
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
                            <a href="{{ url('user/content') }}"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Email Content
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>id</th> -->
                                        <th>S.No.</th>
                                        <th>Email Type</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th> Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($emailContents as $emailContent)
                                    @php
                                    $status = "";
                                    $status = $emailContent->status == 1 ? 'Active' : 'InActive';
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $emailContent->email_type }}</td>
                                            <td>{{ $emailContent->subject }}</td>
                                            <td>{{ $emailContent->message }}</td>
                                            <td>{{ $status }}</td>
                                            <td class="action_td">
                                
                           

                                <a href="{{url('user/edit_content/'. $emailContent->id) }}" data-toggle="tooltip"
                                    title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                                @php
                                $status = @$emailContent->status == 1 ? '0' : '1';
                                $statusicon = @$emailContent->status == 1 ? 'btn-danger' : 'btn-success';

                                $statustite = @$emailContent->status == 1 ? 'InActive' : 'Active';
                                @endphp

                                <a href="{{url('/user/EmailContentChangeStatus/'. $emailContent->id.'/'. $status) }}"
                                    onclick="return confirm('Are you sure to change status?')" data-toggle="tooltip"
                                    title="" class="btn-link {{$statusicon}}" data-original-title="{{$statustite}}">
                                    @if($emailContent->status==0)
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-times"></i>
                                    @endif
                                </a>



                                <a href="{{url('user/delete/'. $emailContent->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this document type ?')"
                                    data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                    data-original-title="Remove">
                                    <i class="fa fa-trash"></i>

                                </a>

                                </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endsection
