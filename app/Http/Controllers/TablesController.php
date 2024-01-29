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

            $userIncomes = Income::where('user_id', $userId)->paginate(10, ['*'], 'income-data');
            $userExpenses = Expense::where('user_id', $userId)->paginate(10,['*'], 'expense-data');

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
