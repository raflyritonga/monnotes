<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index()
    {
        $username = request('username');
        $user = User::where('username', $username)->first();

        if ($user) {
            $userId = $user->id;

            $userIncomes = Income::where('user_id', $userId)->latest()->get();

            return view('dashboard.tables.index', [
                'userIncomes' => $userIncomes
            ]);
        } else {
            return abort(404);
        }
    }
}
