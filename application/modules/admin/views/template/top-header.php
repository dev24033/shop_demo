<header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
          <div class="nav-wrapper">
            
            <ul class="navbar-list right">
             
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
              <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
             
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><?php echo $userdata['username'];?></a></li>
            </ul>
           
           
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
             
             <!--  <li><a class="grey-text text-darken-1" href="<?php /*echo site_url('admin/users/change-password');*/ ?>"> Change Password</a></li> -->
             
              <li class="divider"></li>
             
              <li><a class="grey-text text-darken-1" href="<?php echo admin_base_url(); ?>login/logout"><i class="material-icons">keyboard_tab</i> Logout</a></li>
            </ul>
          </div>
         
        </nav>
      </div>
    </header>