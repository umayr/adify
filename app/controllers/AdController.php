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
        $code = HTML::entities(Input::get('code'));

        $ad = new Ad($name, $size, $code);
        $result = $ad->insert();
        if ($result > 0) {
            return array(
                'result' => 'success',
                'id' => $result
            );
        } else {
            return array(
                'result' => 'failure',
                'id' => -1
            );
        }
    }

    public function all()
    {
        return Ad::getAll();
    }

    public function availableSizes()
    {
        return Ad::getAllSizes();
    }
}