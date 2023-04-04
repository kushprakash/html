<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public function index()
    {
        return view('admin.links.create');
    }

    
}
