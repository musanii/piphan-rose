<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Services\Listings\Columns\Image;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class StaffController extends BaseModuleController
{
    protected $moduleName = 'staff';
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
        Medias::make()
            ->name('profile_image')
            ->label('Profile Picture')
            ->note('Please use a clear, square headshot.')
    );
        $form->add(
        Input::make()
            ->name('position')
            ->label('Job Title / Position')
            ->placeholder('e.g. Senior Math Teacher')
    );

    $form->add(
        Select::make()
            ->name('department')
            ->label('Department')
            ->options(Options::make([
                ['value' => 'humanities', 'label' => 'Humanities'],
                ['value' => 'sciences', 'label' => 'Sciences & Math'],
                ['value' => 'languages', 'label' => 'Languages'],
                ['value' => 'administration', 'label' => 'Administration'],
                ['value' => 'support', 'label' => 'Support Staff'],
            ]))
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
        Image::make()
            ->field('profile_image')
            ->title('Photo')
            ->rounded() 
            //->width(50)
    );

        $table->add(
        Text::make()->field('position')->title('Role')
    );

    $table->add(
        Text::make()->field('department')->title('Department')
    );

        return $table;
    }
}
