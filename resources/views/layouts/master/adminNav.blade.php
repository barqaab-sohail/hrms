

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        
        <!--<div class="user-profile" style="background: url({{asset('Massets/images/background/profile.jpg') }}) no-repeat;">
            <!-- User profile image 
            
            <div class="profile-img"> <img src="" onerror="this.src ='{{asset('Massets/images/default.png')}}';" alt="user" height="50" width="50%" /> </div>
            <!-- User profile text
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">User Name </a>
             --> 
            <div class="dropdown-menu animated flipInY"> 
            <!--
            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
            <div class="dropdown-divider"></div>
            
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
            -->
        </div> 
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{--/////Second Start--}}
                <!--
                <li ><a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                    <li class = "active" ><a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Hiring</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="#">Application</a></li>
                        <li><a href="#" >Jobs</a></li>
                       
                    </ul>
                </li>
                {{--<li> <a class="" href="#" aria-expanded="false"><i class="mdi mdi-account-circle">  </i><span class="hide-menu">Users</span></a>--}}
                {{--</li>--}}
                -->
                 <li @if(request()->is('dashboard')) class="active" @endif><a id="notInclude" class="waves-effect waves-dark" href="{{route('dashboard')}}" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="hide-menu">Dashboard </span></a>
                </li>
               

                <li @if(request()->is('hrms*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Human Resource</span></a>
                    <ul aria-expanded="false" class="collapse">
                       
                        <li><a href="{{route('employee.show', ['id'=>Auth::user()->employee_id])}}">User Detail</a></li>
                    @can('hr_edit_record','hr_insert_record')
                        <li><a href="{{route('employee.create')}}">Add Employee</a></li>
                        <li><a href="{{route('employee.index')}}">List of Employees</a></li>
                        <li><a href="{{route('designation.create')}}">Add Designation</a></li>
                    @endcan
                      
                    </ul>
                </li>
                @can('hr_edit_record','hr_insert_record')
                 <li @if(request()->is('reports*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-chart-pie"></i><span class="hide-menu">Reports & Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('hr.reports')}}">Reports</a></li>
                         <li><a href="{{route('hr.charts')}}">Charts</a></li>
    
                    </ul>
                </li>

               
                 
 

                 <li @if(request()->is('personalFiles*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Personal Files</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('personalFileList')}}">List of Personal Files</a></li>
                        
                    </ul>
                </li>
                
                
 
                @endcan
                @role('Super Admin')
                <li @if(request()->is('*CV*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">CV Records</span></a>
                    <ul aria-expanded="false" class="collapse">  
                        <li><a href="{{route('uploadCv.create')}}">Add CV</a></li>
                        <li><a href="{{route('uploadCv.index')}}">List of CVs</a></li>
                        @role('Super Admin')
                        <li><a href="{{route('cvServices.index')}}">Services</a></li>  
                        @endrole
                    </ul>
                </li>
             
               
                <li @if(request()->is('*submission*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cube"></i><span class="hide-menu">Submissions</span></a>
                    <ul aria-expanded="false" class="collapse">  
                        <li><a href="{{route('addSubmission.create')}}">Add Submission</a></li>
                        <li><a href="{{route('addSubmission.index')}}">List of Submissions</a></li>
                        @role('Super Admin')
                        <li><a href="{{route('cvServices.index')}}">Services</a></li>  
                        @endrole
                    </ul>
                </li>
                @endrole

                @role('Super Admin')
                
                <li @if(request()->is('adminInfo*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-server-network"></i><span class="hide-menu">Admin Info</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('activeUsers')}}">Login User List</a></li>
                        <li><a href="{{route('setUserRights')}}">Set User Rights</a></li>
                         @role('Super Admin')
                        <li><a href="{{route('role.index')}}">Add Roles</a></li>
                        <li><a href="{{route('permission.index')}}">Add Permission</a></li>
                        <li><a href="{{route('permissionRole.index')}}">Give Permissions to Roles</a></li>
                        @endrole
                    </ul>
                </li>

                
                <li @if(request()->is('project*')) class="active" @endif > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Projects</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('projectList')}}">List of Projects</a></li>
                        <li><a href="{{route('createProject')}}">Add Projects</a></li>
                    </ul>
                </li>

                
                <li @if(request()->is('*phone*')) class="active" @endif > <a id="notInclude" class="has-arrow waves-effect waves-dark" href="{{route('contactNumber.index')}}" aria-expanded="false"><i class="fas fa-phone"></i><span class="hide-menu">Contact Numbers</span></a>
                @endrole
                    

                </li>
                 
             


                <!--
                <li  ><a class="has-arrow waves-effect waves-dark" href="#"><i class="mdi mdi-alarm-check"></i><span class="hide-menu">Attendance</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="#" class="active" >Today</a></li>
                        
                        <li><a href="#">My Attendance</a></li>
                        <li><a href="#">Timeline</a></li>
                        
                       {{-- <li><a href="#">History</a></li>
                        <li><a href="#">Incomplete</a></li>--}}
                        
                        <li><a href="#" >Leaves</a></li>
                        
                        <li><a href="#" >My Leaves</a></li>
                    </ul>
                </li>
                
                <li  class="" ><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="#" >Documents</a></li>
                        
                        <li><a href="#" class="active" >Branches</a></li>
                        
                        <li><a href="#">Departments</a></li>
                        
                        <li><a href="#">Designations</a></li>
                        
                        <li><a href="#">Vendor Categories</a></li>
                        
                        <li><a href="#">Leave Management</a></li>
                        
                        <li><a href="#">Skills</a></li>
                           
                        {{--<li><a href="#">Sub Skill</a></li>--}}
                        {{--<li><a href="#">Provident Fund</a></li>--}}
                    </ul>
                </li>
              
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Payments</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Salary</a></li>
                        <li><a href="#">Payroll Payments</a></li>
                        <li><a href="#">Vendor Payments</a></li>
                        <li><a href="#">Bill Payments</a></li>
                    </ul>
                </li>
                
                <li > <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">Manage Roles</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="#" class="active" >Roles And Permissions</a></li>
                        
                    </ul>
                </li>
                
              
                <li  class="" > <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Help</span></a>
                </li>
                  -->
               
                {{--///////// Second End--}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points
    <div class="sidebar-footer">
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <a href="https://www.zoho.com/mail/index1.html" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a></div>
    <form id="logout-form" action="#" method="POST" style="display: none;">{{ csrf_field() }}</form>
    <!-- End Bottom points-->
     
</aside>