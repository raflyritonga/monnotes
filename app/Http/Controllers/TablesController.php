<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class TablesController extends Controller
{
    public function index()
    {
        $username = request('username');
        $user = User::where('username', $username)->first();

        if ($user) {
            $userId = $user->id;

            $userIncomes = Income::where('user_id', $userId)->latest()->paginate(10)->withQueryString();
            $userExpenses = Expense::where('user_id', $userId)->latest()->paginate(10)->withQueryString();

            return view('dashboard.tables.index', [
                'userIncomes' => $userIncomes,
                'userExpenses' => $userExpenses,
                'active' => 'view_tables'
            ]);
        } else {
            return abort(404);
        }
    }
}
