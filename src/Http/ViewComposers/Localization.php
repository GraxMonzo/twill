<?php

namespace A17\Twill\Http\ViewComposers;

use App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\View\View;

class Localization
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $currentLang = Lang::get('twill::lang', [], App::getLocale());
        $fallbackLang = Lang::get('twill::lang', [], config('app.fallback_locale', 'en'));
        $lang = array_merge($fallbackLang, $currentLang);

        $view->with(['lang' => $lang]);
    }
}