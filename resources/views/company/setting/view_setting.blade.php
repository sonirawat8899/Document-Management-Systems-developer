@extends('layouts.company-app')

@section('content')

<div class="content">

    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('company/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{url('company/view_image')}}">Side Setting</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Logo List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
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
                            <a href="{{ url('company/setting') }}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Logo
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Image </th>
                                    <th> Image Type </th>
                                    <th> Company Name </th>
                                    <th> Edit</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $users )
                                <tr>
                                    <td> {{$users->id}}</td>
                                    <td> <img src="{{ asset('images/' .$users->image) }}"
                                            style="height: 50px;width:100px;"></td><?php $type = (($users->image_type == 1) ? "Logo" : (($users->image_type == 2)  ? 'Profile' : ''));?>
                                    <td>{{$type}} </td>
                                    <td>{{$users->company_name}} </td>
                                    <td>
                                        <div class="form-button-action">

                                            <a href='/company/edit_image/{{$users->id }}'>
                                                <button type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                    @endsection
