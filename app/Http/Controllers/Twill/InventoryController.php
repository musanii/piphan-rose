<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class InventoryController extends BaseModuleController
{
    protected $moduleName = 'inventories';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
    }
    

    

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('quantity')->label('Current Stock Quantity')->type('number')
        );

         $form->add(
            Input::make()->name('unit')->label('Unit of Measurement (e.g., kg, Bags)')
        );

        $form->add(
        Input::make()
            ->name('reorder_level')
            ->label('Low Stock Alert Level')
            ->note('We will highlight this item if stock falls below this number.')
            ->type('number')
    );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
  protected function getIndexTableColumns(): TableColumns
{
    $table = parent::getIndexTableColumns();

    // 1. Show the Current Quantity
    $table->add(
        Text::make()->field('quantity')->title('Current Stock')
    );

    // 2. Show the Unit (kg, bags, etc.)
    $table->add(
        Text::make()->field('unit')->title('Unit')
    );

    // 3. The "Classy" Status Alert
    $table->add(
        Text::make()->field('status')->title('Inventory Status')->customRender(function ($inventory) {
            if ($inventory->quantity <= $inventory->reorder_level) {
                return '<span style="color: #d32f2f; font-weight: bold;">⚠️ LOW STOCK</span>';
            }
            return '<span style="color: #2e7d32; font-weight: bold;">✅ OK</span>';
        })
    );

    return $table;
}
}
