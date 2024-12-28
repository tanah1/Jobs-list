<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return "Index";
    }

    function create() {

        return "Create";
    }

    function show(){
        return "Show";
    }
}
