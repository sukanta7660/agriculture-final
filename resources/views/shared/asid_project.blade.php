<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->

                    <li class="active"><a href="#"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


                    <li class="{{ (Request::is('projectexpennse/*', 'projectexpennse') ? 'active' : '') }}"><a href="#"><i class="icon-cabinet"></i> <span>Expanse</span></a>
                        <ul>
                            <li class="{{ (Request::is('projectexptran/list') ? 'active' : '') }}"><a href="{{action('Project\ExpanseController@index')}}">All Expanse</a></li>
                            <li class="{{ (Request::is('projectexpense/list') ? 'active' : '') }}"><a href="{{action('Project\ExpCategoryController@index')}}">Expanse Category</a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is('projectinvest/list') ? 'active' : '') }}"><a href="{{action('Project\InvestController@index')}}"><i class="  icon-database-add"></i> <span>Investment</span></a></li>
                    <li class="{{ (Request::is('projectsell/list') ? 'active' : '') }}"><a href="{{action('Project\SellController@index')}}"><i class="icon-box-add"></i> <span>Sale</span></a></li>

                    <li class="{{ (Request::is('projectwiseReports/*', 'projectwiseReports') ? 'active' : '') }}"><a href="#"><i class="icon-stats-growth"></i> <span>Reports</span></a>
                        <ul>
                            <li class="{{ (Request::is('reports/projectInvest') ? 'active' : '') }}"><a href="{{action('Reports\ProjectWise\InvestReportController@index')}}"><i class="icon-diamond3"></i> Invest Reports</a></li>
                            <li class="{{ (Request::is('reports/projectExpense') ? 'active' : '') }}"><a href="{{action('Reports\ProjectWise\ExpanseController@index')}}"><i class="icon-diamond3"></i> Expense Reports</a></li>
                            <li class="{{ (Request::is('reports/projectSale') ? 'active' : '') }}"><a href="{{action('Reports\ProjectWise\SaleReportController@index')}}"><i class="icon-diamond3"></i> Sale Reports</a></li>
                            <li class="{{ (Request::is('reports/projectprofit') ? 'active' : '') }}"><a href="{{action('Reports\ProjectWise\ProfitReportController@index')}}"><i class="icon-diamond3"></i> Profit & Loss</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>