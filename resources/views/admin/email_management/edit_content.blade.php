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
                        <a href="#">Email Management</a>
                    </li>

                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>

                    <li class="nav-item">
                        <a href="#">Update Email Content</a>
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
                            <div class="card-title">Edit Email Content</div>
                        </div>
                        <div class="card-body">

                            <form action="{{ url('admin/update') }}" id="form" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $emailContents->id }}">
                                <div class="form-group">

                                    <label>Email type</label>

                                    <select name="email_type" id="email_type" class="form-control">
                                        @foreach ($project_manager as $project_manager)
                                            <option value="{{ $project_manager->id }}"> <?php echo $project_manager->email_type; ?>
                                            </option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger  ">
                                        @error('email_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" id="subject" value="{{ $emailContents->subject }}"
                                        class="form-control">
                                    <span class="text-danger  ">
                                        @error('subject')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <input type="text" name="message" id="message" value="{{ $emailContents->message }}"
                                        class="form-control">
                                    <span class="text-danger  ">
                                        @error('message')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Update</button>
                                    <a href="{{ url('admin/show_content') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>

                        </div>

                        <script>
                            $(document).ready(function() {
                                $("#form").validate({
                                    rules: {

                                        email_type: "required",
                                        subject: "required",
                                        message: "required",

                                    },
                                    messages: {

                                        email_type: "*Update your  email type",
                                        subject: "*Update your subject",
                                        message: "*Update your  enter message",


                                    }

                                });
                            });
                        </script>
                    @endsection
