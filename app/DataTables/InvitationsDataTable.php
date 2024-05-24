<?php

namespace App\DataTables;

use App\Models\Classes;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Nickname;
use App\Models\Nicknames2;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InvitationsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query,Request $request): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->setRowId('id')->setRowAttr([
                'align' => 'center'
            ])
            ->editColumn('created_at',function(Invitation $invitation){
                return $invitation->created_at->diffForHumans();
            })

            ->editColumn('status','pages.invitations.datatable.status')
            ->editColumn('type',function(Invitation $invitation){
                if($invitation->type==1)
                    $content=__('svu.outreg');
                else
                    $content=__('svu.inreg');
                return $content;

            })->editColumn('event_id',function(Invitation $invitation){
                return $invitation->event->title;
            })->addColumn('action',  function(Invitation $invitation){
                $nicknames=Nickname::all();
                $nicknames2=Nicknames2::all();
                $classes=Classes::all();
                return view('pages.invitations.datatable.action',['invitation'=> $invitation,'nicknames'=>$nicknames,'nicknames2'=>$nicknames2,'classes'=>$classes]);
            })
            ->escapeColumns([])
            ->filter(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('name', 'like', "%" . $request->get('name') . "%");
                }
                if ($request->has('email')) {
                    $query->where('email', 'like', "%" . $request->get('email') . "%");
                }
                if ($request->has('mobile')) {
                    $query->where('mobile', 'like', "%" . $request->get('mobile') . "%");
                }
                if ($request->has('type')) {
                    $query->where('type', '=', $request->get('type'));
                }
                if ($request->has('status')) {
                    $query->where('status', 'like', "%" . $request->get('status') . "%");
                }
                if ($request->has('event')) {
                    $query->where('event_id', '=', $request->get('event'));
                }

            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Invitation $model): QueryBuilder
    {

        return $model->newQuery()->where('type','=',1);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('invitations')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        //Button::make('reset'),
                        //Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make(['name'=>'id','title'=>__('svu.id'),'data'=>"id"]),
            Column::make(['name'=>'created_at','title'=>__('svu.created_at'),'data'=>"created_at"]),
            Column::make(['name'=>'name','title'=>__('svu.name'),'data'=>"name"]),
            Column::make(['name'=>'email','title'=>__('svu.email'),'data'=>"email"]),
            Column::make(['name'=>'mobile','title'=>__('svu.mobile'),'data'=>"mobile"]),
            Column::make(['name'=>'status','title'=>__('svu.status'),'data'=>"status"]),
            Column::make(['name'=>'type','title'=>__('svu.type'),'data'=>"type"]),
            Column::make(['name'=>'event_id','title'=>__('svu.event'),'data'=>"event_id"]),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Invitations_' . date('YmdHis');
    }
}
