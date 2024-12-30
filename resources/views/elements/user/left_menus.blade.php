<?php
$currentURL =Route::current()->uri;
?>

<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                <div class="avatar-sm float-left mr-2">
                    <?php if($logo->profile){?>
                        <img src="{{ asset('images/profile/' .$logo->profile) }}" alt="..." class="avatar-img rounded-circle" >
                    <?php }else{?>
                        <img src="{{ asset('images/profiles/demo-profile.png') }}" alt="..." class="avatar-img rounded-circle" >
                    <?php }?>
                </div>


                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item <?php if($currentURL =='user/home'){ echo ' '; }?>">
                    <a href="{{url('user/home')}}">
                        <i class="fas fa-layer-group"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if($currentURL =='user/userManagement' || $currentURL =='user/adduser'|| $currentURL =='user/edit_user/{id}'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/userManagement','user/adduser','user/edit_user/{id}'])){ echo 'show';}?>" id="base">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/userManagement' || $currentURL =='user/edit_user/{id}'){ echo 'active '; }?> ">
                                <a  class="sidebar-link" href="{{url('user/userManagement')}}">
                                    <span class="sub-item">User List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/adduser'){ echo 'active '; }?> ">
                                <a href="{{url('user/adduser')}}">
                                    <span class="sub-item">Add User</span>
                                </a>
                            </li>

                        </ul>
                    </div>


                </li>
                <li class="nav-item <?php if($currentURL =='user/view_category' || $currentURL =='user/category'|| $currentURL =='user/update_category/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                        <p>Category Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/view_category','user/category','user/update_category/{id}'])){ echo 'show';}?>" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/view_category' || $currentURL =='user/update_category/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/view_category')}}">
                                    <span class="sub-item">Category List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/category'){ echo 'active'; }?> ">
                                <a href="{{url('user/category')}}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='user/view_project' || $currentURL =='user/project'|| $currentURL =='user/update_project/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#project">
                    <i class="fa fa-industry"></i>
                        <p>Project Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/view_project','user/project','user/update_project/{id}'])){ echo 'show';}?>" id="project">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/view_project' || $currentURL =='user/update_project/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/view_project')}}">
                                    <span class="sub-item">Project List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/project'){ echo 'active'; }?> ">
                                <a href="{{url('user/project')}}">
                                    <span class="sub-item">Add Project</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='user/document' || $currentURL =='user/createdocument'|| $currentURL =='user/edit_document/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#forms">
                    <i class="fas fa-file"></i>
                        <p>Document Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/document','user/createdocument','user/edit_document/{id}'])){ echo 'show';}?>" id="forms">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/document' || $currentURL =='user/edit_document/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/document')}}">
                                    <span class="sub-item">View Document</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/createdocument'){ echo 'active'; }?> ">
                                <a href="{{url('user/createdocument')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='user/documentType_view' || $currentURL =='user/documentType_add'|| $currentURL =='user/documentType_edit/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#list">
                    <i class="far fa-folder-open"></i>
                        <p>Document Type</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/documentType_view','user/documentType_add','user/documentType_edit/{id}'])){ echo 'show';}?>" id="list">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/documentType_view' || $currentURL =='user/documentType_edit/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/documentType_view')}}">
                                    <span class="sub-item">Document List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/documentType_add'){ echo ''; }?> ">
                                <a href="{{url('user/documentType_add')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='user/logos' || $currentURL =='user/update_logo'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#setting">
                    <i class="fas fa-cog"></i>
                        <p>Setting Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/logos','user/update_logo'])){ echo 'show';}?>" id="setting">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/logos' || $currentURL =='user/update_logo'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/logos')}}">
                                    <span class="sub-item">Logo & profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='user/show_notification' || $currentURL =='user/notification'|| $currentURL =='user/edit_notification/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#tables">
                    <i class="fas fa-bullhorn"></i>
                        <p>Notification</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/show_notification','user/notification','user/edit_notification/{id}'])){ echo 'show';}?>" id="tables">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/show_notification' || $currentURL =='user/edit_notification/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/show_notification')}}">
                                    <span class="sub-item">View Notification</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/notification'){ echo 'active'; }?> ">
                                <a href="{{url('user/notification')}}">
                                    <span class="sub-item">Add Notification</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='user/view_content' || $currentURL =='user/addcontent'|| $currentURL =='user/update_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#charts">
                    <i class="fas fa-edit"></i>
                        <p>CMS</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/view_content','user/addcontent','user/update_content/{id}'])){ echo 'show';}?>" id="charts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/view_content' || $currentURL =='user/update_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/view_content')}}">
                                    <span class="sub-item">View CMS</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/addcontent'){ echo 'active'; }?> ">
                                <a href="{{url('user/addcontent')}}">
                                    <span class="sub-item">Add CMS</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                    <li class="nav-item <?php if($currentURL =='user/show_email' || $currentURL =='user/edit_email/{id}' || $currentURL =='user/email' || $currentURL =='user/content' || $currentURL =='user/show_content' || $currentURL =='user/edit_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#email">
                    <i class="fas fa-envelope"></i>
                        <p>Email Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/show_email','user/email','user/edit_email/{id}','user/show_content','user/content','user/edit_content/{id}'])){ echo 'show';}?>" id="email">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/show_email' || $currentURL =='user/edit_email/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/show_email')}}">
                                    <span class="sub-item">Email Types</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/email'){ echo 'active'; }?> ">
                                <a href="{{url('user/email')}}">
                                    <span class="sub-item">Add Email Type</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if($currentURL =='user/show_content' || $currentURL =='user/edit_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/show_content')}}">
                                    <span class="sub-item">Email Content</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='user/content'){ echo 'active'; }?> ">
                                <a href="{{url('user/content')}}">
                                    <span class="sub-item">Add Email Content</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




                        <li class="nav-item <?php if($currentURL =='user/module_permission'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#maps">
                    <i class="fas fa-key"></i>
                        <p>Permission</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['user/module_permission'])){ echo 'show';}?>" id="maps">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='user/module_permission'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('user/module_permission')}}">
                                    <span class="sub-item">Module Permission</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>

