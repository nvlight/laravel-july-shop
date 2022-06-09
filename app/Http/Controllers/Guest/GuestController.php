<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('guest.index', compact('categories'));
    }
}
