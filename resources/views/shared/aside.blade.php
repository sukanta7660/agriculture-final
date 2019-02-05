<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->

                    <li class="active"><a href="{{action('MainController@index')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="navigation-divider"></li>

                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('expense/*', 'expense') ? 'active' : '') }}"><a href="#"><i class="icon-cabinet"></i> <span>General Expanse</span></a>
                        <ul>
                            <li class="{{ (Request::is('gnexpensetran/list') ? 'active' : '') }}"><a href="{{action('GnExpense\GnExpTransacController@index')}}"><i class="icon-diamond3"></i> All Expanse</a></li>
                            <li class="{{ (Request::is('expense/list') ? 'active' : '') }}"><a href="{{action('GnExpenseController@index')}}"><i class="icon-diamond3"></i> Expanse Category</a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is('allProjects/*','allProjects') ? 'active' : '') }}"><a href="#"><i class="icon-database-insert"></i> <span>All Project</span></a>
                        <ul>
                            <li class="{{ (Request::is('projects/list') ? 'active' : '') }}"><a href="{{action('ProjectsController@index')}}"><i class="icon-diamond3"></i> Running Project</a></li>
                            <li class="{{ (Request::is('completeProject/list') ? 'active' : '') }}"><a href="{{action('ProjectsController@completed_project')}}"><i class="icon-diamond3"></i> Complete Project</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Request::is('asset/list') ? 'active' : '') }}" ><a href="{{action('Asset\AssetController@index')}}"><i class="icon-add-to-list"></i> <span> Assets</span></a></li>

                    <li class="{{ (Request::is('bank/*', 'bank') ? 'active' : '') }}"><a href="#"><i class="icon-database-insert"></i> <span>Bank Book</span></a>
                        <ul>
                            <li class="{{ (Request::is('bankbook/list') ? 'active' : '') }}"><a href="{{action('Bank\BankTransacController@index')}}"><i class="icon-diamond3"></i> Bank Transaction</a></li>
                            <li class="{{ (Request::is('bank/list') ? 'active' : '') }}"><a href="{{action('Bank\BankIinfoController@index')}}"><i class="icon-diamond3"></i> Bank Info</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stats-growth"></i> <span>Reports</span></a>
                        <ul>
                            <li class="{{ (Request::is('reports/genExpense') ? 'active' : '') }}"><a href="{{action('Reports\ExpanseController@index')}}"><i class="icon-diamond3"></i> Expense Reports</a></li>
                            <li class="{{ (Request::is('reports/bankbook') ? 'active' : '') }}"><a href="{{action('Reports\BankbookController@index')}}"><i class="icon-diamond3"></i> Bank Reports</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Request::is('users/list') ? 'active' : '') }}" ><a href="{{action('User\UserController@index')}}"><i class="icon-users"></i> <span>All Users</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>