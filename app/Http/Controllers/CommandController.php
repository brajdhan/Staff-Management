<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function index()
    {
        return view('commands.index');
    }

    public function runMigration(){
        Artisan::call("migrate");

        return redirect()->back()->with(['message' => 'Migrate successful.']);
    }

    public function runMigrationRollback(){
        Artisan::call("migrate:rollback");

        return redirect()->back()->with(['message' => 'Migrate rollback successful.']);
    }

    public function runMigrationFresh(){
        Artisan::call("migrate:fresh");

        return redirect()->back()->with(['message' => 'Fresh migrate successful.']);
    }

    public function runOptimizeClear(){
        Artisan::call("optimize:clear");

        return redirect()->back()->with(['message' => 'Optimize clear successful.']);
    }

    public function runConfigCache(){
        Artisan::call("config:cache");

        return redirect()->back()->with(['message' => 'Config cache successful.']);
    }

    public function runDBSeed(){
        Artisan::call("db:seed");

        return redirect()->back()->with(['message' => 'DB seed successful.']);
    }
    
}