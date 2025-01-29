<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function migrate()
    {
        Artisan::call('migrate');

        return "<pre>" . Artisan::output() . "</pre>";
    }
    public function migrateSeed()
    {
        Artisan::call('migrate --seed');

        return "<pre>" . Artisan::output() . "</pre>";
    }
    public function migrateFresh()
    {
        Artisan::call('migrate:fresh');

        return "<pre>" . Artisan::output() . "</pre>";
    }
    public function migrateFreshSeed()
    {
        Artisan::call('migrate:fresh --seed');

        return "<pre>" . Artisan::output() . "</pre>";
    }
    public function seed()
    {
        Artisan::call('db:seed');

        return "<pre>" . Artisan::output() . "</pre>";
    }
    public function symbolicLink()
    {
        Artisan::call('storage:link');

        return "<pre>" . Artisan::output() . "</pre>";
    }
}
