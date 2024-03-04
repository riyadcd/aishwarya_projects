<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\addProduct;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;



class UserTable extends DataTableComponent
{
    // protected $model = addProduct::class;
    public function builder(): Builder
    {
            return addProduct::query();
    }
    // public function query(): Builder
    // {
    //     return addProduct::query()
    //         ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    // }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setFilterLayoutSlideDown()
        ->setSecondaryHeaderTrAttributes(function($rows) {
            return ['class' => 'bg-gray-100'];
        })
        ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
            if ($column->isField('id')) {
                return ['class' => 'text-red-500'];
            }

            return ['default' => true];
        })
        // ->setUseHeaderAsFooterEnabled()
        ;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Product Name", "productName")
                ->sortable()
                ->searchable(),
            Column::make("Product Variety", "productVariety")
                ->sortable()
                ->searchable(),
            Column::make("Product Quantity", "productQuantity")
                ->sortable()
                ->searchable(),
            column::make("Product Price","productPrice")
                ->sortable()
                ->searchable(),
            Column::make("type","type")
                ->sortable()
                ->searchable(),    
            Column::make("Image", "productImage")
                ->sortable()
                ->format(
                    fn ($value, $row, Column $column) => '<img src="'.$row->productImage.'" width="50px;" hight="50px;">'
                )
                ->html(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('Actions')
                // ->unclickable()
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => route('livewireTable'))
                ])  
                ->buttons([
                    LinkColumn::make('Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => route('DeletelivewireTable'.$row->id))
                ])    
        ];
    }

    public function filters(): array
    {
        return [
            DateFilter::make('From')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('created_at', '>=', $value);
                }),
            DateFilter::make('to')
                ->filter(function(Builder $builder , string $value) {
                    $builder->where('created_at','<=',$value);
                }),    
            SelectFilter::make('Variety')
                ->setFilterPillTitle('Variety')
                ->setFilterPillValues([
                    '' => 'All',
                ])
                ->options([
                    '' => 'All',
                    '1' => 'Product Variety',
                ])
                ->filter(function (Builder $builder, string $value) {
                        $builder->where('productVariety',$value);    
                }),
            SelectFilter::make('Type')
                ->setFilterPillTitle('Type')
                ->setFilterPillValues([
                    '' => 'All',
                ])
                ->options([
                    '' => 'All',
                    '0' => '0',
                    '1' => '1',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if($value == '0')
                    {
                        $builder->where('type',0);
                    }else if($value === '1'){
                        $builder->where('type',1);
                    }    
                })        
        ];
    }
}
