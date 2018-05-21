<?php

namespace App\Http\ViewComposers;

use App\Information;
use Illuminate\View\View;

class InformationComposer
{
    public function compose(View $view)
    {
        $informations = Information::orderBy('created_at')->get();
        $view->with('informations', $informations);
        $informationstwo = Information::orderBy('created_at')->take(3)->get();
        $view->with('informationstwo', $informationstwo);
    }
}
