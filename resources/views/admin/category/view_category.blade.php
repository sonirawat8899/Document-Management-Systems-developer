@extends('layouts.admin-app')
@section('content')

<?php
use app\Models\User;
?>

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
                    <a href="{{ url('admin/view_category') }}">Category Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Category List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
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
                            <a href="{{ url('admin/category') }}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Category
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                 <th> S.No</th>
                <th> Parent Name </th>
                <th> Name </th>
                <th> Description</th>
                {{-- <th> Company Name</th> --}}
                <th> Status</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            @php
         $status = $category->status == 1 ? 'Active' : 'InActive';
             @endphp

                <tr>
                <td>{{$loop->iteration}}</td>
                    {{-- <td> {{$category ->parent_id}}</td> --}}
                    <td> {{ User::getCategoryID($category->parent_id) }}</td>
                    <td> {{$category ->name}}</td>
                    <td><?php echo $category ->description ?></td>
                    {{-- <td> {{ User::getCompanyName($category->company_id) }}</td> --}}
                    <td> {{$status}}</td>
                    <td class="action_td">
                        <div class="form-button-action">
                        <a href="{{ url('admin/update_category/'. $category ->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                <i class="fa fa-edit"> </i>
                             </a>
                              @php
                                                        $status = @$category ->status == 1 ? '0' : '1';
                                                        $statusicon = @$category ->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$category ->status == 1 ? 'InActive' : 'Active';
                                                    @endphp

                                                    <a href="{{ url('categoryChangeStatus/' . $category ->id . '/' . $status) }}"
                                                        onclick="return confirm('Are you sure to change status?')"
                                                        data-toggle="tooltip" title=""
                                                        class="btn-link {{ $statusicon }}"
                                                        data-original-title="{{ $statustite }}">
                                                        @if ($category ->status == 0)
                                                            <i class="fa fa-check"></i>
                                                        @else
                                                            <i class="fa fa-times"></i>
                                                        @endif
                                                    </a>

                 <a href="{{ url('admin/delete_category/'.$category->id)}}"
                                onclick="return confirm('Are you sure you want to delete this category ?')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>




@endsection



