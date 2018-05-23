<div class="headerbar">      
  <a class="menutoggle"><i class="fa fa-bars"></i></a>	      
  <form class="searchform" action="index.html" method="post">
    <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
  </form>	      
  <div class="header-right">
    <ul class="headermenu">
      <li>
        <div class="btn-group">
          <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <!-- <span class="badge">2</span>-->
          </button>
          <div class="dropdown-menu dropdown-menu-head pull-right">
            <h5 class="title">2 Newly Registered Users</h5>
            <ul class="dropdown-list user-list"> 
              <li class="new"><a href="">See All Users</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li>
        <div class="btn-group">
          <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
            <i class="glyphicon glyphicon-envelope"></i>
            <!--<span class="badge">1</span>-->
          </button>
          <div class="dropdown-menu dropdown-menu-head pull-right">
            <h5 class="title">You Have 1 New Message</h5>
            <ul class="dropdown-list gen-list">              
              <li class="new"><a href="">Read All Messages</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li>
        <div class="btn-group">
          <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
            <i class="glyphicon glyphicon-globe"></i>
            <!--<span class="badge">5</span>-->
          </button>
          <div class="dropdown-menu dropdown-menu-head pull-right">
            <h5 class="title">You Have 5 New Notifications</h5>
            <ul class="dropdown-list gen-list">             
              <li class="new"><a href="">See All Notifications</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <img src="{{ URL::to('public/images/photos/loggeduser.png') }}" alt="" />
            {{$user->first}} {{$user->last}}
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Account Settings</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
            <li><a href="{{URL::route('logout')}}"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
          </ul>
        </div>
      </li>     
    </ul>
  </div><!-- header-right -->	      
</div><!-- headerbar -->

