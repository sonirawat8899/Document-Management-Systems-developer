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
                        <a href="{{ url('admin/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Document Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Document List</a>
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
                                <a href="{{ url('admin/createdocument') }}"><button
                                        class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        Add Document
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
                                            <th> Project Name</th>
                                            <th> Category Name </th>
                                            <th> Document Type </th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th> Documents </th>
                                            <th> Document Extension </th>
                                            <th> Status</th>
                                            <th> Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                            @php
                                                $status = $document->status == 1 ? 'Active' : 'InActive';
                                            @endphp

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>


                                                <td>{{ User::getDocumentID($document->project_id) }}</td>

                                                <td> {{ User::getCategoryID($document->category_id) }}</td>
                                                <td> {{ User::getDocumentTypeID($document->document_type_id) }}</td>
                                                <td> {{ $document->title }}</td>
                                                <td> <?php echo $document->description; ?></td>
                                                <td> {{ $document->documents }}</td>
                                                <td> {{ $document->extension }}</td>
                                                <td>{{ $status }}</td>

                                                <td class="action_td">
                                                    <div class="form-button-action">
                                                        <a href="{{ url('admin/edit_document/' . $document->id) }}"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit">
                                                            </i>

                                                        </a>
                                                        @php
                                                            $status = @$document->status == 1 ? '0' : '1';
                                                            $statusicon = @$document->status == 1 ? 'btn-danger' : 'btn-success';

                                                            $statustite = @$document->status == 1 ? 'InActive' : 'Active';
                                                        @endphp

                                                        <a href="{{ url('DocumentChangeStatus/' . $document->id . '/' . $status) }}"
                                                            onclick="return confirm('Are you sure to change status?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn-link {{ $statusicon }}"
                                                            data-original-title="{{ $statustite }}">
                                                            @if ($document->status == 0)
                                                                <i class="fa fa-check"></i>
                                                            @else
                                                                <i class="fa fa-times"></i>
                                                            @endif
                                                        </a>




                                                        <!-- <a href="{{ url('admin/view_document/' . $document->id) }}"
                                                            onclick="return confirm('Are you sure you want to view this document ?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-success" data-original-title="Remove">
                                                            <i class="fa fa-eye"></i>

                                                        </a> -->





                                                        <a href="{{ url('admin/delete_document/' . $document->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete this document ?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Remove">
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
