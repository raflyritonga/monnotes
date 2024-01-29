@extends('dashboard.layouts.main')

@section('dashboard_content')

<div class="d-flex align-items-center">
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary">
        <h4>Add Expense</h4>
        <hr>
        <form class="p-lg-3 mb-3" method="POST" action="/dashboard/expense">
            @csrf
            <div class="form-group">
                <label for="expense_description">Expense Description</label>
                <input type="text" class="form-control p-3 mb-4 mt-2" id="expense_description"  name="expense_description" placeholder="Car's credit" value="{{ old('expenseDescription') }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount (IDR)</label>
                <input type="number" class="form-control p-3 mb-4 mt-2" id="amount" name="amount" value="{{ old('amount') }}" placeholder="100000" required>
            </div>
            <div class="form-group">
                <label for="category">Expense Category</label>
                <select class="form-select p-3 mb-4 mt-2" name="category" id="category" required>
                <option selected disabled>Pick a category</option>
                    <option value="Housing">Housing</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Food">Food</option>
                    <option value="Utilities">Utilities</option>
                    <option value="Insurance">Insurance</option>
                    <option value="Medical & Healthcare">Medical & Healthcare</option>
                    <option value="Saving, Investing, & Debt Payments">Saving, Investing, & Debt Payments</option>
                    <option value="Personal Spending">Personal Spending</option>
                    <option value="Recreation & Entertainment">Recreation & Entertainment</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfExpense">Date of Expense</label>
                <input type="date" class="form-control p-3 mb-4 mt-2" id="date_of_expense" name="date_of_expense" required>
            </div>
            @include('dashboard.components.submitBtn')
        </form>
    </div>
</div>



@endsection
