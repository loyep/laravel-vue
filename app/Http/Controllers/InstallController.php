<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

/**
 * Class InstallController
 * @package App\Http\Controllers
 */
class InstallController extends Controller
{
    /**
     * @return View
     */
    public function welcome(): View
    {
        return view('installer.welcome');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function migrate()
    {
        set_time_limit(0);
        try {
            Artisan::call('migrate');
        } catch (\Exception $e) {
            return $this->error(route('website.installer.config'), '数据库连接出错：' . $e->getMessage());
        }
    }

    /**
     * @param $url
     * @param $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function error($url, $message)
    {
        Session::flash('message', $message);
        Session::flash('message_type', 1);
        return redirect($url);
    }

}
