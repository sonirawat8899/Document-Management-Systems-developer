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
                <li class="nav-item <?php if($currentURL =='admin/home'){ echo ' '; }?>">
                    <a href="{{url('admin/home')}}">
                        <i class="fas fa-layer-group"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php if($currentURL =='admin/userManagement' || $currentURL =='admin/adduser'|| $currentURL =='admin/edit_user/{id}'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/userManagement','admin/adduser','admin/edit_user/{id}'])){ echo 'show';}?>" id="base">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/userManagement' || $currentURL =='admin/edit_user/{id}'){ echo 'active '; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/userManagement')}}">
                                    <span class="sub-item">User List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/adduser'){ echo 'active '; }?> ">
                                <a href="{{url('admin/adduser')}}">
                                    <span class="sub-item">Add User</span>
                                </a>
                            </li>

                        </ul>
                    </div>


                </li>
                <li class="nav-item <?php if($currentURL =='admin/view_company' || $currentURL =='admin/add_company'|| $currentURL =='admin/update_company/{id}'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#company">
                     <i class="fa fa-user-plus"></i>
                        <p>Company Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/view_company','admin/add_company','admin/update_company/{id}'])){ echo 'show';}?>" id="company">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/view_company' || $currentURL =='admin/update_company/{id}'){ echo 'active'; }?> ">
                                <a class="sidebar-link" href="{{url('admin/view_company')}}">
                                    <span class="sub-item">Company List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/add_company'){ echo 'active'; }?> ">
                                <a href="{{url('admin/add_company')}}">
                                    <span class="sub-item">Add Company</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='admin/view_category' || $currentURL =='admin/category'|| $currentURL =='admin/update_category/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                        <p>Category Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/view_category','admin/category','admin/update_category/{id}'])){ echo 'show';}?>" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/view_category' || $currentURL =='admin/update_category/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/view_category')}}">
                                    <span class="sub-item">Category List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/category'){ echo 'active'; }?> ">
                                <a href="{{url('admin/category')}}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='admin/view_project' || $currentURL =='admin/project'|| $currentURL =='admin/update_project/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#project">
                    <i class="fa fa-industry"></i>
                        <p>Project Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/view_project','admin/project','admin/update_project/{id}'])){ echo 'show';}?>" id="project">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/view_project' || $currentURL =='admin/update_project/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/view_project')}}">
                                    <span class="sub-item">Project List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/project'){ echo 'active'; }?> ">
                                <a href="{{url('admin/project')}}">
                                    <span class="sub-item">Add Project</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='admin/document' || $currentURL =='admin/createdocument'|| $currentURL =='admin/edit_document/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#forms">
                    <i class="fas fa-file"></i>
                        <p>Document Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/document','admin/createdocument','admin/edit_document/{id}'])){ echo 'show';}?>" id="forms">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/document' || $currentURL =='admin/edit_document/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/document')}}">
                                    <span class="sub-item">View Document</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/createdocument'){ echo 'active'; }?> ">
                                <a href="{{url('admin/createdocument')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='admin/documentType_view' || $currentURL =='admin/documentType_add'|| $currentURL =='admin/documentType_edit/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#list">
                    <i class="far fa-folder-open"></i>
                        <p>Document Type</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/documentType_view','admin/documentType_add','admin/documentType_edit/{id}'])){ echo 'show';}?>" id="list">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/documentType_view' || $currentURL =='admin/documentType_edit/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/documentType_view')}}">
                                    <span class="sub-item">Document List</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/documentType_add'){ echo ''; }?> ">
                                <a href="{{url('admin/documentType_add')}}">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item <?php if($currentURL =='admin/logos' || $currentURL =='admin/update_logo'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#setting">
                    <i class="fas fa-cog"></i>
                        <p>Setting Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/logos','admin/update_logo'])){ echo 'show';}?>" id="setting">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/logos' || $currentURL =='admin/update_logo'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/logos')}}">
                                    <span class="sub-item">Logo & profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='admin/show_notification' || $currentURL =='admin/notification'|| $currentURL =='admin/edit_notification/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#tables">
                    <i class="fas fa-bullhorn"></i>
                        <p>Notification</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/show_notification','admin/notification','admin/edit_notification/{id}'])){ echo 'show';}?>" id="tables">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/show_notification' || $currentURL =='admin/edit_notification/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/show_notification')}}">
                                    <span class="sub-item">View Notification</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/notification'){ echo 'active'; }?> ">
                                <a href="{{url('admin/notification')}}">
                                    <span class="sub-item">Add Notification</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item <?php if($currentURL =='admin/view_content' || $currentURL =='admin/addcontent'|| $currentURL =='admin/update_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#charts">
                    <i class="fas fa-edit"></i>
                        <p>CMS</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/view_content','admin/addcontent','admin/update_content/{id}'])){ echo 'show';}?>" id="charts">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/view_content' || $currentURL =='admin/update_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/view_content')}}">
                                    <span class="sub-item">View CMS</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/addcontent'){ echo 'active'; }?> ">
                                <a href="{{url('admin/addcontent')}}">
                                    <span class="sub-item">Add CMS</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='admin/show_email' || $currentURL =='admin/edit_email/{id}' || $currentURL =='admin/email' || $currentURL =='admin/content' || $currentURL =='admin/show_content' || $currentURL =='admin/edit_content/{id}'){ echo ''; }?>">
                    <a data-toggle="collapse" href="#email">
                    <i class="fas fa-envelope"></i>
                        <p>Email Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/show_email','admin/email','admin/edit_email/{id}','admin/show_content','admin/content','admin/edit_content/{id}'])){ echo 'show';}?>" id="email">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/show_email' || $currentURL =='admin/edit_email/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/show_email')}}">
                                    <span class="sub-item">Email Types</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/email'){ echo 'active'; }?> ">
                                <a href="{{url('admin/email')}}">
                                    <span class="sub-item">Add Email Type</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if($currentURL =='admin/show_content' || $currentURL =='admin/edit_content/{id}'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/show_content')}}">
                                    <span class="sub-item">Email Content</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if($currentURL =='admin/content'){ echo 'active'; }?> ">
                                <a href="{{url('admin/content')}}">
                                    <span class="sub-item">Add Email Content</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




                        <li class="nav-item <?php if($currentURL =='admin/module_permission'){ echo ' '; }?>">
                    <a data-toggle="collapse" href="#maps">
                    <i class="fas fa-key"></i>
                        <p>Permission</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['admin/module_permission'])){ echo 'show';}?>" id="maps">
                        <ul class="nav nav-collapse">
                            <li class="sidebar-item <?php if($currentURL =='admin/module_permission'){ echo 'active'; }?> ">
                                <a  class="sidebar-link" href="{{url('admin/module_permission')}}">
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

