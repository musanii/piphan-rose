<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use App\Models\Student;

class FinanceController extends BaseModuleController
{
    protected $moduleName = 'finances';

    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void {}

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        // Dropdown to link this bill/statement to a student
        $form->add(
            Select::make()
                ->name('student_id')
                ->label('Select Student')
                ->options(
                    Options::make(Student::all()->map(function ($student) {
                        return ['value' => $student->id, 'label' => $student->title];
                    })->toArray())
                )
        );

        // $form->add(
        //     Input::make()->name('amount')->label('Total Amount')->type('number')
        // );
        $form->add(
            Input::make()->name('total_due')->label('Invoiced Amount')->type('number')->prefix('KES ')
        );

        $form->add(
            Input::make()->name('amount_paid')->label('Total Paid to Date')->type('number')->prefix('KES ')
        );

        // The File Upload for Statements
        $form->add(
            Medias::make()->name('statement_file')->label('Attach Receipt/Statement')
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();
        $table->add(
        Text::make()->field('student_name')->title('Student')->customRender(function ($finance) {
            // This checks if a student is linked, then returns their title (name)
            return $finance->student ? $finance->student->title : 'No Student Linked';
        })
    );

        $table->add(Text::make()->field('total_due')->title('Invoiced'));
        $table->add(Text::make()->field('amount_paid')->title('Paid'));

        // The Logic Column
        $table->add(
            Text::make()->field('balance')->title('Balance Due')->customRender(function ($finance) {
                $balance = $finance->total_due - $finance->amount_paid;

                if ($balance <= 0) {
                    return '<span style="color: #2e7d32; font-weight: bold;">Cleared</span>';
                }

                return '<span style="color: #d32f2f; font-weight: bold;">'.number_format($balance).' KES</span>';
            })
        );

        return $table;
    }
}
