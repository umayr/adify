<?php

/**
 * Created by Umayr Shahid.
 * Date: 11/2/2014
 * Time: 7:25 PM
 */
class AdController extends BaseController
{
    public function create()
    {
        // TODO: Input Validation.

        $name = Input::get('name');
        $size = Input::get('size');

        $ad = new Ad($name, $size);
        return $ad->insert();
    }

    public function all()
    {
        return Ad::getAll();
    }
    public function availableSizes(){
        return Ad::getAllSizes();
    }
}