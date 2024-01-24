@extends('dashboard.layouts.main')

@section('dashboard_content')

<div class="d-flex align-items-center">
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary">
        <h4>Edit Expense</h4>
        <hr>
        <form class="p-lg-3 mb-3" method="POST" action="/dashboard/expense/{{ $expense->id }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="expense_description">Expense Description</label>
                <input type="text" class="form-control p-3 mb-4 mt-2" id="expense_description" name="expense_description"
                    placeholder="Housing" value="{{ old('expenseDescription', $expense->expense_description) }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount (IDR)</label>
                <input type="number" class="form-control p-3 mb-4 mt-2" id="amount" name="amount"
                    value="{{ old('amount', $expense->amount) }}" placeholder="100000" required>
            </div>
            <div class="form-group">
                <label for="category">Expense Category</label>
                <select class="form-select p-3 mb-4 mt-2" name="category" id="category" required>
                    <option selected disabled>Pick a category</option>
                    <option value="Housing" {{ old('category', $expense->category) == 'Housing' ? ' selected' : '' }}>Housing</option>
                    <option value="Transportation" {{ old('category', $expense->category) == 'Transportation' ? ' selected' : '' }}>Transportation</option>
                    <option value="Food" {{ old('category', $expense->category) == 'Food' ? ' selected' : '' }}>Food</option>
                    <option value="Utilities" {{ old('category', $expense->category) == 'Utilities' ? ' selected' : '' }}>Utilities</option>
                    <option value="Insurance" {{ old('category', $expense->category) == 'Insurance' ? ' selected' : '' }}>Insurance</option>
                    <option value="Medical & Healthcare" {{ old('category', $expense->category) == 'Medical & Healthcare' ? ' selected' : '' }}>Medical & Healthcare</option>
                    <option value="Saving, Investing, & Debt Payments" {{ old('category', $expense->category) == 'Saving, Investing, & Debt Payments' ? ' selected' : '' }}>Saving, Investing, & Debt Payments</option>
                    <option value="Personal Spending" {{ old('category', $expense->category) == 'Personal Spending' ? ' selected' : '' }}>Personal Spending</option>
                    <option value="Recreation & Entertainment" {{ old('category', $expense->category) == 'Recreation & Entertainment' ? ' selected' : '' }}>Recreation & Entertainment</option>
                    <option value="Others" {{ old('category', $expense->category) == 'Others' ? ' selected' : '' }}>Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfExpense">Date of Expense</label>
                <input type="date" class="form-control p-3 mb-4 mt-2" id="date_of_expense" name="date_of_expense" value="{{ old('date_of_expense', $expense->date_of_expense) }}"
                    required>
            </div>
            @include('dashboard.components.button')
        </form>
    </div>
</div>

@endsection
