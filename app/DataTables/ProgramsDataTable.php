<?php

namespace App\DataTables;

use App\Models\isis_programs;
use App\Models\Program;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProgramsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id')
        ->setRowAttr([
            'align' => 'center'
        ])
        ->editColumn('created_at',function(isis_programs $pro){
            return $pro->created_at->diffForHumans();
        })
        ->addColumn('action', function($row){

             $btn ='<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

             return $btn;
     })
     ;

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Program $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('programs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

                  Column::make('program_id'),
                  Column::make('program_name'),
                  Column::make('program_name_ar'),
                  Column::make('program_code'),
                  Column::make('desc'),
                  Column::make('created_at'),
                  Column::make('action'),

            //Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Programs_' . date('YmdHis');
    }
}
