@extends('dashboard.layouts.main')

@section('dashboard_content')

<div class="d-flex align-items-center">
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary">
        <h4>Add Income</h4>
        <hr>
        <form class="p-lg-3 mb-3" method="POST" action="/dashboard/income/{{ $income->id }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="income_description">Income Description</label>
                <input type="text" class="form-control p-3 mb-4 mt-2" id="income_description" name="income_description"
                    placeholder="Monthly salary" value="{{ old('incomeDescription', $income->income_description) }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount (IDR)</label>
                <input type="number" class="form-control p-3 mb-4 mt-2" id="amount" name="amount"
                    value="{{ old('amount', $income->amount) }}" placeholder="100000" required>
            </div>
            <div class="form-group">
                <label for="category">Income Category</label>
                <select class="form-select p-3 mb-4 mt-2" name="category" id="category" required>
                    <option selected disabled>Pick a category</option>
                    <option value="Wage" {{ old('category', $income->category) == 'Wage' ? ' selected' : '' }}>Wage</option>
                    <option value="Salary" {{ old('category', $income->category) == 'Salary' ? ' selected' : '' }}>Salary</option>
                    <option value="Gift" {{ old('category', $income->category) == 'Gift' ? ' selected' : '' }}>Gift</option>
                    <option value="Commission" {{ old('category', $income->category) == 'Commission' ? ' selected' : '' }}>Commission</option>
                    <option value="Investment" {{ old('category', $income->category) == 'Investment' ? ' selected' : '' }}>Investment</option>
                    <option value="Others" {{ old('category', $income->category) == 'Others' ? ' selected' : '' }}>Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfIncome">Date of Income</label>
                <input type="date" class="form-control p-3 mb-4 mt-2" id="date_of_income" name="date_of_income" value="{{ old('date_of_income', $income->date_of_income) }}"
                    required>
            </div>
            @include('dashboard.components.button')
        </form>
    </div>
</div>



@endsection
