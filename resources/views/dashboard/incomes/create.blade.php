@extends('dashboard.layouts.main')

@section('dashboard_content')

<div class="d-flex align-items-center">
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary">
        <h4>Add Income</h4>
        <hr>
        <form class="p-lg-3 mb-3" method="POST" action="/dashboard/income">
            @csrf
            <div class="form-group">
                <label for="income_description">Income Description</label>
                <input type="text" class="form-control p-3 mb-4 mt-2" id="income_description"  name="income_description" placeholder="Monthly salary" value="{{ old('incomeDescription') }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount (IDR)</label>
                <input type="number" class="form-control p-3 mb-4 mt-2" id="amount" name="amount" value="{{ old('amount') }}" placeholder="100000" required>
            </div>
            <div class="form-group">
                <label for="category">Income Category</label>
                <select class="form-select p-3 mb-4 mt-2" name="category" id="category" required>
                <option selected disabled>Pick a category</option>
                <option value="Wage">Wage</option>
                <option value="Salary">Salary</option>
                <option value="Gift">Gift</option>
                <option value="Commission">Commission</option>
                <option value="Investment">Investment</option>
                <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfIncome">Date of Income</label>
                <input type="date" class="form-control p-3 mb-4 mt-2" id="date_of_income" name="date_of_income" required>
            </div>
            @include('dashboard.components.button')
        </form>
    </div>
</div>



@endsection
