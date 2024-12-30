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
                            <span class="user-level">Company Name</span>
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
                            </li>ile
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
                <li class="nav-item <?php if($currentURL =='company/home'){ echo ' '; }?>">
                    <a href="{{url('company/home')}}">
                        <i class="fas fa-layer-group"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                    <li class="nav-item <?php if($currentURL =='company/userManagement' || $currentURL =='company/adduser'|| $currentURL =='company/edit_user/{id}'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/userManagement','company/adduser','company/edit_user/{id}'])){ echo 'show';}?>" id="base">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/userManagement' || $currentURL =='company/edit_user/{id}'){ echo 'active '; }?> ">
                                <a  class="sidebar-link" href="{{url('company/userManagement')}}">
                                    <span class="sub-item">User List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/adduser'){ echo 'active '; }?> ">
                                <a href="{{url('company/adduser')}}">
                                    <span class="sub-item">Add User</span>
                                </a>
                            </li>

                        </ul>
                    </div>


                </li>


                <li class="nav-item <?php if($currentURL =='company/view_category' || $currentURL =='company/category'|| $currentURL =='company/update_category/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                        <p>Category Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/view_category','company/category','company/update_category/{id}'])){ echo 'show';}?>" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/view_category' || $currentURL =='company/update_category/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/view_category')}}">
                                    <span class="sub-item">Category List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/category'){ echo 'active'; }?> ">
                                <a href="{{url('company/category')}}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='company/view_project' || $currentURL =='company/project'|| $currentURL =='company/update_project/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#project">
                    <i class="fa fa-industry"></i>
                        <p>Project Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/view_project','company/project','company/update_project/{id}'])){ echo 'show';}?>" id="project">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/view_project' || $currentURL =='company/update_project/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/view_project')}}">
                                    <span class="sub-item">Project List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/project'){ echo 'active'; }?> ">
                                <a href="{{url('company/project')}}">
                                    <span class="sub-item">Add Project</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='company/document' || $currentURL =='company/createdocument'|| $currentURL =='company/edit_document/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#forms">
                    <i class="fas fa-file"></i>
                        <p>Document Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/document','company/createdocument','company/edit_document/{id}'])){ echo 'show';}?>" id="forms">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/document' || $currentURL =='company/edit_document/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/document')}}">
                                    <span class="sub-item">View Document</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/createdocument'){ echo ''; }?> ">
                                <a href="{{url('company/createdocument')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='company/documentType_view' || $currentURL =='company/documentType_add'|| $currentURL =='company/documentType_edit/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#list">
                    <i class="far fa-folder-open"></i>
                        <p>Document Type</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/documentType_view','company/documentType_add','company/documentType_edit/{id}'])){ echo 'show';}?>" id="list">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/documentType_view' || $currentURL =='company/documentType_edit/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/documentType_view')}}">
                                    <span class="sub-item">Document List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/documentType_add'){ echo 'active'; }?> ">
                                <a href="{{url('company/documentType_add')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='company/logos' || $currentURL =='company/update_logo'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#setting">
                    <i class="fas fa-cog"></i>
                        <p>Setting Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/logos','company/update_logo'])){ echo 'show';}?>" id="setting">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/logos' || $currentURL =='company/update_logo'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/logos')}}">
                                    <span class="sub-item">Logo & profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>




                <li class="nav-item <?php if($currentURL =='company/show_notification' || $currentURL =='company/notification'|| $currentURL =='company/edit_notification/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#tables">
                    <i class="fas fa-bullhorn"></i>
                        <p>Notification</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/show_notification','company/notification','company/edit_notification/{id}'])){ echo 'show';}?>" id="tables">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/show_notification' || $currentURL =='company/edit_notification/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/show_notification')}}">
                                    <span class="sub-item">View Notification</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/notification'){ echo 'active'; }?> ">
                                <a href="{{url('company/notification')}}">
                                    <span class="sub-item">Add Notification</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='company/view_content' || $currentURL =='company/addcontent'|| $currentURL =='company/update_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#charts">
                    <i class="fas fa-edit"></i>
                        <p>CMS</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/view_content','company/addcontent','company/update_content/{id}'])){ echo 'show';}?>" id="charts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/view_content' || $currentURL =='company/update_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/view_content')}}">
                                    <span class="sub-item">View CMS</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/addcontent'){ echo 'active'; }?> ">
                                <a href="{{url('company/addcontent')}}">
                                    <span class="sub-item">Add CMS</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                    <li class="nav-item <?php if($currentURL =='company/show_email' || $currentURL =='company/edit_email/{id}' || $currentURL =='company/email' || $currentURL =='company/content' || $currentURL =='company/show_content' || $currentURL =='company/edit_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#email">
                    <i class="fas fa-envelope"></i>
                        <p>Email Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/show_email','company/email','company/edit_email/{id}','company/show_content','company/content','company/edit_content/{id}'])){ echo 'show';}?>" id="email">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/show_email' || $currentURL =='company/edit_email/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/show_email')}}">
                                    <span class="sub-item">Email Types</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/email'){ echo 'active'; }?> ">
                                <a href="{{url('company/email')}}">
                                    <span class="sub-item">Add Email Type</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if($currentURL =='company/show_content' || $currentURL =='company/edit_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/show_content')}}">
                                    <span class="sub-item">Email Content</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='company/content'){ echo 'active'; }?> ">
                                <a href="{{url('company/content')}}">
                                    <span class="sub-item">Add Email Content</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                        <li class="nav-item <?php if($currentURL =='company/module_permission'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#maps">
                    <i class="fas fa-key"></i>
                        <p>Permission</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/module_permission'])){ echo 'show';}?>" id="maps">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='company/module_permission'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('company/module_permission')}}">
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

