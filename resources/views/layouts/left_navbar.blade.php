<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            {{--
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}"/></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span>
                                <span class="text-muted text-xs block">
                                    {{ Auth::user()->name }} <b class="caret"></b>
                                </span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('profile') }}">Profile</a></li>

                                                <li><a href="contacts.html">Contacts</a></li>
                                                <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            --}}
            <li class="active">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i><span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Customers</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('customers.index') }}">All Customers</a></li>
                    <li><a href="{{ route('customers.create') }}">New Customer</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Productlines</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('productlines.index') }}">All Productlines</a></li>
                    <li><a href="{{ route('productlines.create') }}">New Productline</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Projects</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('projects.index') }}">All Projects</a></li>
                    <li><a href="{{ route('projects.create') }}">New Project</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Jobs</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('jobs.index') }}">All Jobs</a></li>
                    <li><a href="{{ route('jobs.create') }}">New Job</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Pricebooks</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('pricebooks.index') }}">All Pricebooks</a></li>
                    <li><a href="{{ route('pricebooks.create') }}">New Pricebook</a></li>
                </ul>
            </li>
            {{--
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="graph_flot.html">Flot Charts</a></li>
                    <li><a href="graph_morris.html">Morris.js Charts</a></li>
                    <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                    <li><a href="graph_chartjs.html">Chart.js</a></li>
                    <li><a href="graph_chartist.html">Chartist</a></li>
                    <li><a href="c3.html">c3 charts</a></li>
                    <li><a href="graph_peity.html">Peity Charts</a></li>
                    <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                </ul>
            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span
                            class="label label-warning pull-right">16/24</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="mailbox.html">Inbox</a></li>
                    <li><a href="mail_detail.html">Email view</a></li>
                    <li><a href="mail_compose.html">Compose email</a></li>
                    <li><a href="email_template.html">Email templates</a></li>
                </ul>
            </li>
            <li>
                <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span> </a>
            </li>
            <li>
                <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="form_basic.html">Basic form</a></li>
                    <li><a href="form_advanced.html">Advanced Plugins</a></li>
                    <li><a href="form_wizard.html">Wizard</a></li>
                    <li><a href="form_file_upload.html">File Upload</a></li>
                    <li><a href="form_editors.html">Text Editor</a></li>
                    <li><a href="form_autocomplete.html">Autocomplete</a></li>
                    <li><a href="form_markdown.html">Markdown</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span> <span
                            class="pull-right label label-primary">SPECIAL</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="profile_2.html">Profile v.2</a></li>
                    <li><a href="contacts_2.html">Contacts v.2</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project detail</a></li>
                    <li><a href="activity_stream.html">Activity stream</a></li>
                    <li><a href="teams_board.html">Teams board</a></li>
                    <li><a href="social_feed.html">Social feed</a></li>
                    <li><a href="clients.html">Clients</a></li>
                    <li><a href="full_height.html">Outlook view</a></li>
                    <li><a href="vote_list.html">Vote list</a></li>
                    <li><a href="file_manager.html">File manager</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="issue_tracker.html">Issue tracker</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="article.html">Article</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="pin_board.html">Pin board</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="search_results.html">Search results</a></li>
                    <li><a href="lockscreen.html">Lockscreen</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="login_two_columns.html">Login v.2</a></li>
                    <li><a href="forgot_password.html">Forget password</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="404.html">404 Page</a></li>
                    <li><a href="500.html">500 Page</a></li>
                    <li><a href="empty_page.html">Empty page</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span
                            class="label label-info pull-right">NEW</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="toastr_notifications.html">Notification</a></li>
                    <li><a href="nestable_list.html">Nestable list</a></li>
                    <li><a href="agile_board.html">Agile board</a></li>
                    <li><a href="timeline_2.html">Timeline v.2</a></li>
                    <li><a href="diff.html">Diff</a></li>
                    <li><a href="pdf_viewer.html">PDF viewer</a></li>
                    <li><a href="i18support.html">i18 support</a></li>
                    <li><a href="sweetalert.html">Sweet alert</a></li>
                    <li><a href="idle_timer.html">Idle timer</a></li>
                    <li><a href="truncate.html">Truncate</a></li>
                    <li><a href="password_meter.html">Password meter</a></li>
                    <li><a href="spinners.html">Spinners</a></li>
                    <li><a href="spinners_usage.html">Spinners usage</a></li>
                    <li><a href="tinycon.html">Live favicon</a></li>
                    <li><a href="google_maps.html">Google maps</a></li>
                    <li><a href="datamaps.html">Datamaps</a></li>
                    <li><a href="social_buttons.html">Social buttons</a></li>
                    <li><a href="code_editor.html">Code editor</a></li>
                    <li><a href="modal_window.html">Modal window</a></li>
                    <li><a href="clipboard.html">Clipboard</a></li>
                    <li><a href="text_spinners.html">Text spinners</a></li>
                    <li><a href="forum_main.html">Forum view</a></li>
                    <li><a href="validation.html">Validation</a></li>
                    <li><a href="tree_view.html">Tree view</a></li>
                    <li><a href="loading_buttons.html">Loading buttons</a></li>
                    <li><a href="chat_view.html">Chat view</a></li>
                    <li><a href="masonry.html">Masonry</a></li>
                    <li><a href="tour.html">Tour</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="draggable_panels.html">Draggable Panels</a></li>
                    <li><a href="resizeable_panels.html">Resizeable Panels</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="video.html">Video</a></li>
                    <li><a href="tabs_panels.html">Panels</a></li>
                    <li><a href="tabs.html">Tabs</a></li>
                    <li><a href="notifications.html">Notifications & Tooltips</a></li>
                    <li><a href="helper_classes.html">Helper css classes</a></li>
                    <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                </ul>
            </li>
            <li>
                <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="table_basic.html">Static Tables</a></li>
                    <li><a href="table_data_tables.html">Data Tables</a></li>
                    <li><a href="table_foo_table.html">Foo Tables</a></li>
                    <li><a href="jq_grid.html">jqGrid</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="ecommerce_products_grid.html">Products grid</a></li>
                    <li><a href="ecommerce_product_list.html">Products list</a></li>
                    <li><a href="ecommerce_product.html">Product edit</a></li>
                    <li><a href="ecommerce_product_detail.html">Product detail</a></li>
                    <li><a href="ecommerce-cart.html">Cart</a></li>
                    <li><a href="ecommerce-orders.html">Orders</a></li>
                    <li><a href="ecommerce_payments.html">Credit Card form</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                    <li><a href="slick_carousel.html">Slick Carousel</a></li>
                    <li><a href="carousel.html">Bootstrap Carousel</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                </ul>
            </li>
            <li>
                <a href="css_animation.html"><i class="fa fa-magic"></i> <span
                            class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
            </li>
            <li class="landing_link">
                <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span
                            class="nav-label">Landing Page</span> <span
                            class="label label-warning pull-right">NEW</span></a>
            </li>
            <li class="special_link">
                <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
            </li>
            --}}
        </ul>

    </div>
</nav>


{{--
<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'The Egyptian School') }}
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
            --}}
{{--
                <li class="active">
                    <a aria-expanded="false" role="button" href="{{ url('/') }}"> Home</a>
                </li>
            <li class="dropdown">
                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                   data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                </ul>
            </li>
            --}}{{--

            <!-- Authentication Links -->
            @if (!Auth::guest())
                <!-- ADD ROLES AND USERS LINKS -->
                    @role('admin')
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                    @role('professor')
                    <li><a href="{{ route('courses.index') }}">My Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
                    <li><a href="{{ route('questions.index') }}">Question Bank</a></li>
                    <li><a href="{{ route('exams.index') }}">Exams</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                    @role('student')
                    <li><a href="{{ route('courses.index') }}">My Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">My Schedule</a></li>
                    <li><a href="{{ route('exams.index') }}">My Exams</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    <li><a href="{{ route('activity.index') }}">Activity</a></li>
                    @endrole

                    @role('parent')
                    <li><a href="{{ url('student') }}">My Student</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                @endif
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa fa-user-md"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
--}}
