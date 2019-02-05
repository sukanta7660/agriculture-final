<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'MainController@index');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'MainController@index');


    /* Project Category */
    Route::get('projects/list', 'ProjectsController@index');
    Route::post('/projects/list/save', 'ProjectsController@save');
    Route::post('/projects/list/edit', 'ProjectsController@edit');
    Route::get('/projects/list/del/{id}', 'ProjectsController@del');

    Route::get('/projects/list/end/{id}', 'ProjectsController@complete');
    /*  Project Category */

    /* Complete Project */
    Route::get('completeProject/list', 'ProjectsController@completed_project');
    Route::get('completeProject/view/{id}', 'Project\ProjectController@complete');
    /* Complete Project */

    /* Project */
    Route::get('projects/{id}', 'Project\ProjectController@index');

    /* Project ExpnseCat */
    Route::get('projectexpense/list', 'Project\ExpCategoryController@index');
    Route::post('projectexpense/list/save', 'Project\ExpCategoryController@save');
    Route::post('projectexpense/list/edit', 'Project\ExpCategoryController@edit');
    Route::get('projectexpense/list/del/{id}', 'Project\ExpCategoryController@del');
    /* Project ExpnseCat */


    /* Project ExpnseTransaction */
    Route::get('projectexptran/list', 'Project\ExpanseController@index');
    Route::post('projectexptran/list/save', 'Project\ExpanseController@save');
    Route::post('projectexptran/list/edit', 'Project\ExpanseController@edit');
    Route::get('projectexptran/list/del/{id}', 'Project\ExpanseController@del');
    /* Project ExpnseTransaction */

    /* Project Sell */
    Route::get('projectsell/list', 'Project\SellController@index');
    Route::post('projectsell/list/save', 'Project\SellController@save');
    Route::post('projectsell/list/edit', 'Project\SellController@edit');
    Route::get('projectsell/list/del/{id}', 'Project\SellController@del');
    /* Project Sell */

    /* Project Invest */
    Route::get('projectinvest/list', 'Project\InvestController@index');
    Route::post('projectinvest/list/save', 'Project\InvestController@save');
    Route::post('projectinvest/list/edit', 'Project\InvestController@edit');
    Route::get('projectinvest/list/del/{id}', 'Project\InvestController@del');
    /* Project Invest */

    /* Project */

    /* Expense */
    Route::get('expense/list', 'GnExpenseController@index');
    Route::post('/expense/list/save', 'GnExpenseController@save');
    Route::post('/expense/list/edit', 'GnExpenseController@edit');
    Route::get('/expense/list/del/{id}', 'GnExpenseController@del');
    /*  Expense */

    /* BankInfo */
    Route::get('bank/list', 'Bank\BankIinfoController@index');
    Route::post('/bank/list/save', 'Bank\BankIinfoController@save');
    Route::post('/bank/list/edit', 'Bank\BankIinfoController@edit');
    Route::get('/bank/list/del/{id}', 'Bank\BankIinfoController@del');
    /*  BankInfo */

    /* BankBook */
    Route::get('bankbook/list', 'Bank\BankTransacController@index');
    Route::post('/bankbook/list/deposit', 'Bank\BankTransacController@deposit');
    Route::post('/bankbook/list/edit', 'Bank\BankTransacController@withdraw');
    /*  BankBook */

    /* Expense */
    Route::get('gnexpensetran/list', 'GnExpense\GnExpTransacController@index');
    Route::post('/gnexpensetran/list/save', 'GnExpense\GnExpTransacController@save');
    Route::post('/gnexpensetran/list/edit', 'GnExpense\GnExpTransacController@edit');
    Route::get('/gnexpensetran/list/del/{id}', 'GnExpense\GnExpTransacController@del');
    /*  Expense */

    //Assets
    Route::get('asset/list', 'Asset\AssetController@index');
    Route::post('asset/list/save', 'Asset\AssetController@save');
    Route::post('asset/list/edit', 'Asset\AssetController@edit');
    Route::get('asset/list/del/{id}', 'Asset\AssetController@del');
    //Assets

// ========================================start Report==================================

//bankReports

    Route::get('reports/bankbook', 'Reports\BankbookController@index');
    Route::post('reports/bankbook/show', 'Reports\BankbookController@show');
    Route::post('reports/bankbook/bank_show', 'Reports\BankbookController@bank_show');

//bankReports

//expenseReports

    Route::get('reports/genExpense', 'Reports\ExpanseController@index');
    Route::post('reports/expanse/show', 'Reports\ExpanseController@show');

//expenseReports


//========================================project wise reports========================

//expenseReports
    Route::get('reports/projectExpense', 'Reports\ProjectWise\ExpanseController@index');
    Route::post('reports/projectExpense/show', 'Reports\ProjectWise\ExpanseController@show');
//expenseReports

//sellReports
    Route::get('reports/projectSale', 'Reports\ProjectWise\SaleReportController@index');
    Route::post('reports/projectSale/show', 'Reports\ProjectWise\SaleReportController@show');
//sellReports

//investReports
    Route::get('reports/projectInvest', 'Reports\ProjectWise\InvestReportController@index');
    Route::post('reports/projectInvest/show', 'Reports\ProjectWise\InvestReportController@show');
//investReports

// Profit Report
    Route::get('reports/projectprofit', 'Reports\ProjectWise\ProfitReportController@index');
    Route::post('reports/projectprofit/show', 'Reports\ProjectWise\ProfitReportController@profit_lose');
// Profit Report

//========================================project wise reports========================

// ========================================end Report==================================

//userlist

    Route::get('users/list', 'User\UserController@index');
    Route::post('users/list/save', 'User\UserController@save');
    Route::post('users/list/edit', 'User\UserController@edit');
    Route::get('users/list/del/{id}', 'User\UserController@del');

//userlist

    Route::get('pp/{id}', function () {
        return view('projet');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
