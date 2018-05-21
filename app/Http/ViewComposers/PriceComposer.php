<?php

namespace App\Http\ViewComposers;

use App\Program;
use Illuminate\View\View;

class PriceComposer
{
    public function compose(View $view)
    {
        $programs = Program::orderBy('program_name')->get();
        $view->with('programs', $programs);
    }
}
