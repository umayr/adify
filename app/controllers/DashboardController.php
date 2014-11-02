<?php
/**
 * Author   : Umayr Shahid
 * Date     : 11/2/2014
 * Time     : 7:34 PM
 */

class DashboardController extends BaseController{

    public function index(){
        return View::make('dashboard.index');
    }
} 