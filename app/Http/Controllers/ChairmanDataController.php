<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChairmanDataController extends Controller
{
    public function getBoardAssignment()
    {
        var_dump( auth()->user()->role->id );
    }

    public function getStatistics()
    {
        echo "getStatistics";
    }

}
