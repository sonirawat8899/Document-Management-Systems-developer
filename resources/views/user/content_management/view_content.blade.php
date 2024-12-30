@extends('layouts.user-app')

@section('content')
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
                    <a href="{{ url('user/view_content') }}">Content Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Content</a>
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
                            <a href="{{ url('user/addcontent') }}"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Content
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
                                        <th> Title</th>
                                        <th> Description</th>
                                        <th> Image </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                        <!-- <th> Delete </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cms as $cms)
                                    @php
                                    $status = $cms->status == 1 ? 'Active' : 'InActive';
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $cms->title }}</td>
                                        <td> <?php echo $cms->description ?></td>
                                        <td> <img src="{{ asset('cms/' . $cms->image) }}"
                                                style="height: 50px;width:100px;">
                                        </td>
                                        <td> {{$status}}</td>
                                        <td class="action_td">


                                            <a href="{{url('/user/update_content/' . $cms->id) }}"
                                                data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                                </button>
                                            </a>

                                            @php
                                            $status = @$cms->status == 1 ? '0' : '1';
                                            $statusicon = @$cms->status == 1 ? 'btn-danger' : 'btn-success';

                                            $statustite = @$cms->status == 1 ? 'InActive' : 'Active';
                                            @endphp


                                            <a href="{{url('user/CMSChangeStatus/'. $cms->id.'/'. $status) }}"
                                                onclick="return confirm('Are you sure to change status?')"
                                                data-toggle="tooltip" title="" class="btn-link {{$statusicon}}"
                                                data-original-title="{{$statustite}}">
                                                @if($cms->status==0)
                                                <i class="fa fa-check"></i>
                                                @else
                                                <i class="fa fa-times"></i>
                                                @endif
                                            </a>
                                            <a href="{{ url('/user/delete_content/' .  $cms->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this content ?')"
                                                data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                data-original-title="Remove">
                                                <i class="fa fa-trash"></i>

                                            </a>
                        </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                @endsection