<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="active"><a id="add-ticket" href="#add"><i class='fa fa-plus'></i> <span>{{ trans('adminlte_lang::message.new-request') }}</span></a></li>
            <!-- Optionally, you can add icons to the links -->
            <li id="my-requests" class="treeview">
                <a><i class='fa fa-list-ul'></i><span>My tickets</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a id="my-requests-all" href="#my-requests-all">
                        <i class="fa fa-inbox"></i>
                        All
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-requests-new" href="#my-requests-new">
                        <i class="fa fa-arrow-right"></i>
                        New
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-requests-in-progress" href="#my-requests-in-progress">
                        <i class="fa fa-tasks"></i>
                        In progress
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-requests-feedback" href="#my-requests-feedback">
                        <i class="fa fa-exchange"></i>
                        Feedback
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-requests-out-of-date" href="#my-requests-out-of-date">
                        <i class="fa fa-calendar-times-o"></i>
                        Out of date
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-requests-closed" href="#my-requests-closed">
                        <i class="fa fa-check"></i>
                        Closed
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                </ul>
            </li>

            <li id="involved-requests" class="treeview">
                <a><i class='fa fa-list-ul'></i><span>Involved tickets</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a id="involved-requests-all" href="#involved-requests-all">
                        <i class="fa fa-inbox"></i>
                        All
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="involved-requests-new" href="#involved-requests-new">
                        <i class="fa fa-arrow-right"></i>
                        New
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="involved-requests-in-progress" href="#involved-requests-in-progress">
                        <i class="fa fa-tasks"></i>
                        In progress
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="involved-requests-feedback" href="#involved-requests-feedback">
                        <i class="fa fa-exchange"></i>
                        Feedback
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="involved-requests-out-of-date" href="#involved-requests-out-of-date">
                        <i class="fa fa-calendar-times-o"></i>
                        Out of date
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="involved-requests-closed" href="#involved-requests-closed">
                        <i class="fa fa-check"></i>
                        Closed
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                </ul>
            </li>

            <li id="my-assigned-requests" class="treeview">
                <a><i class='fa fa-list-ul'></i><span>Assigned tickets</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a id="my-assigned-requests-all" href="#my-assigned-requests-all">
                        <i class="fa fa-inbox"></i>
                        All
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-assigned-requests-new" href="#my-assigned-requests-new">
                        <i class="fa fa-arrow-right"></i>
                        New
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-assigned-requests-feedback" href="#my-assigned-requests-feedback">
                        <i class="fa fa-tasks"></i>
                        In progress
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-assigned-requests-feedback" href="#my-assigned-requests-feedback">
                        <i class="fa fa-exchange"></i>
                        Feedback
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-assigned-requests-out-of-date" href="#my-assigned-requests-out-of-date">
                        <i class="fa fa-calendar-times-o"></i>
                        Out of date
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="my-assigned-requests-closed" href="#my-assigned-requests-closed">
                        <i class="fa fa-check"></i>
                        Closed
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                </ul>
            </li>

            <li id="team-requests" class="treeview">
                <a><i class='fa fa-list-ul'></i><span>Team's tickets</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a id="team-requests-all" href="#team-requests-all">
                        <i class="fa fa-inbox"></i>
                        All
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="team-requests-new" href="#team-requests-new">
                        <i class="fa fa-arrow-right"></i>
                        New
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="team-requests-in-progress" href="#team-requests-in-progress">
                        <i class="fa fa-tasks"></i>
                        In progress
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="team-requests-feedback" href="#team-requests-feedback">
                        <i class="fa fa-exchange"></i>
                        Feedback
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="team-requests-out-of-date" href="#team-requests-out-of-date">
                        <i class="fa fa-calendar-times-o"></i>
                        Out of date
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                    <li><a id="team-requests-closed" href="#!team-requests-closed">
                        <i class="fa fa-check"></i>
                        Closed
                        <span class="pull-right-container"><small class="label pull-right bg-yellow">1</small></span>
                    </a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
