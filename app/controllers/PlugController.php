<?php

/**
 * Author   : Umayr Shahid
 * Date     : 11/4/2014
 * Time     : 1:35 PM
 */
class PlugController extends BaseController
{
    public function index()
    {

        $ips = (new IPDetection())->get();
        $ips['IP'] = Request::ip();

        var_dump($ips);

        $useragent = new BrowserDetection();
        var_dump(array(
            'browser' => $useragent->getBrowser(),
            'platform' => $useragent->getPlatform(),
            'version' => $useragent->getVersion(),
            'is_mobile' => $useragent->isMobile(),
            'is_robot' => $useragent->isRobot()
        ));

        var_dump(Request::server());
    }

    public function plugger($unique_id)
    {
        $plug = Ad::getFromUniqueId($unique_id);
        $cookie = Cookie::make(md5($_ENV['TOKEN_ID']), Hash::make($_ENV['TOKEN_SECRET']));
        $view = View::make('plug')->with('plug', $plug);

        return Response::make($view)->withCookie($cookie);
    }
} 