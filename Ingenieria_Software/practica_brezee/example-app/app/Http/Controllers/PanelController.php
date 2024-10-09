<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PanelController extends Controller
{
    public function index(): View
    {
        // Todos los usuarios de la base de datos
        // $users = User::all();
        $currentUser = Auth::user();  // Usuario actual
        $users = User::query()->whereNotIn('id', [$currentUser->id])->get();

        return view('panel', compact('users', 'currentUser'));
    }
}
