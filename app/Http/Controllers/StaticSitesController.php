<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class StaticSitesController extends Controller
{
    public function showHome(): Response
    {
        return Inertia::render('Home');
    }

    public function showPrivacy(): Response
    {
        return Inertia::render('Privacy');
    }

    public function showImpressum(): Response
    {
        return Inertia::render('Impressum');
    }

    public function showReferentenInfo(): Response
    {
        return Inertia::render('ReferentenInfoNew');
    }

    public function showInfoPage(): Response
    {
        return Inertia::render('InfoPage');
    }

    public function showArrival(): Response
    {
        return Inertia::render('Arrival');
    }

}
