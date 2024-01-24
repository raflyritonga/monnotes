@extends('dashboard.layouts.main')

@section('dashboard_content')
<div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary table-responsive">
    <h4>Income Table</h4>
    <hr>
    <table class="table table-hover">
        <thead class="table-light p-2">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Income Description</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userIncomes as $income)
            <tr class="pt-2">
                <td scope="row">{{ $income->date_of_income }}</td>
                <td scope="row">{{ $income->income_description }}</td>
                <td scope="row">{{ $income->category }}</td>
                <td scope="row">Rp. {{ number_format($income->amount, 0, ',', '.') }}</td>
                <td scope="row">
                    <a href="/dashboard/income/{{ $income->id }}/edit" class="text-decoration-none" style="margin-right: 1.2rem"><i class="bi bi-pencil-fill"></i></a>
                    <form action="/dashboard/income/{{ $income->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 p-2" onclick="return confirm('Do you really want to delete this record?')" >
                            <i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary table-responsive">
    <h4>Expense Table</h4>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Expense Description</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userExpenses as $expense)
            <tr>
                <td scope="row">{{ $expense->date_of_expense }}</td>
                <td scope="row">{{ $expense->expense_description }}</td>
                <td scope="row">{{ $expense->category }}</td>
                <td scope="row">Rp. {{ number_format($expense->amount, 0, ',', '.') }}</td>

                <td scope="row">
                    <a href="/dashboard/expense/{{ $expense->id }}/edit" class="text-decoration-none" style="margin-right: 1.2rem"><i
                            class="bi bi-pencil-fill"></i></a>
                    <form action="/dashboard/expense/{{ $expense->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 p-2"
                            onclick="return confirm('Do you really want to delete this record?')">
                            <i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
