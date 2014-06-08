<?php
namespace App\Filters;

use M6Web\Component\Firewall\Firewall;

/**
 * Class AccessControlFilter
 * @package App\Filters
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AccessControlFilter
{
    /** @var Firewall */
    protected $firewall;

    /**
     * @param Firewall $firewall
     */
    public function __construct(Firewall $firewall)
    {
        $this->firewall = $firewall;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function filter()
    {
        $connAllowed = $this->firewall
            ->setDefaultState(false)
            ->addList(\Config::get('ip.allow'), 'local', true)
            ->setIpAddress(gethostbyname(gethostname()))
            ->handle();
        if(!$connAllowed)
        {
            return \Redirect::action("App\Controllers\HomeController@getIndex");
        }
    }
} 