<?php

namespace App\Livewire;

use App\Models\Income;
use App\Livewire\Dish;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class IncomesTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Income::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return
        PowerGrid::columns()
            ->addColumn('date_of_income')
            ->addColumn('income_description')
            ->addColumn('category')
            ->addColumn('amount_formatted', function (Income $model){
                return number_format($model->amount, 0, ',', '.');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                -> title('Date of Income')
                -> field('date_of_income', 'date_of_income')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('Income Description')
                ->field('income_description', 'income_description')
                ->searchable()
                ->sortable(),


            Column::add()
                ->title('Category')
                ->field('category', 'category')
                ->searchable(),

            Column::add()
                ->title('Amount')
                ->field('amount_formatted', 'amount')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        // Redirect to the edit route
        $this->redirect('/dashboard/income/' . $rowId . '/edit?active=my_stats');
    }

    public function actions(\App\Models\Income $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */


}
