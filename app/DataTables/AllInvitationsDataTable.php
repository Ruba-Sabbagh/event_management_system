<?php

namespace App\DataTables;

use App\Models\AllInvitation;
use App\Models\Chair;
use App\Models\Classes;
use App\Models\Invitation;
use App\Models\Nickname;
use App\Models\Nicknames2;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AllInvitationsDataTable extends DataTable
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
        ->editColumn('attendance','pages.invitations.datatable.attendance')
        ->editColumn('type',function(Invitation $invitation){
            if($invitation->type==1)
                $content=__('svu.outreg');
            else
                $content=__('svu.inreg');
            return $content;

        })->editColumn('event_id',function(Invitation $invitation){
            return $invitation->event->title;
        })->editColumn('chair',function(Invitation $invitation){
            foreach ($invitation->chairs as $bc){
                if($bc->pivot->status ==1){
                    return $bc->code;
                }
            }
        })->addColumn('action',  function(Invitation $invitation){
            $nicknames=Nickname::all();
            $nicknames2=Nicknames2::all();
            $classes=Classes::all();
            $eventplace=$invitation->event->event_place;
            $chairs=DB::select(
                'select notb.* from
                (select c.* , d.status , d.event_id from
                            (SELECT * from chair c WHERE c.event_place ='. $eventplace.') c
                            left join ( select ic.*, i.event_id from (SELECT * from invitations_chair ) ic
                                inner join (SELECT * from invitations i WHERE i.event_id = '.$invitation->event_id.') i
                                on i.id = ic.invitation_id ) d
                            on c.id= d.chair_id
                            where   d.status is null or d.status=0
                 ) notb
                 left join (select c.* , d.status , d.event_id from
                            (SELECT * from chair c WHERE c.event_place ='. $eventplace.') c
                            left join ( select ic.*, i.event_id from (SELECT * from invitations_chair ) ic
                                inner join (SELECT * from invitations i WHERE i.event_id = '.$invitation->event_id.') i
                                on i.id = ic.invitation_id ) d
                            on c.id= d.chair_id
                            where   d.status=1
                 ) b on notb.id=b.id

                 where b.status is null '
            );// Chair::where('event_place','=',$eventplace)->get();
            return view('pages.invitations.datatable.action',['invitation'=> $invitation,'nicknames'=>$nicknames,'nicknames2'=>$nicknames2,'classes'=>$classes,'chairs'=>$chairs]);
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
            if ($request->has('attendance')) {
                $query->where('attendance', '=', $request->get('attendance'));
            }

        });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Invitation $model): QueryBuilder
    {
        return $model->newQuery();


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
            Column::make(['name'=>'attendance','title'=>__('svu.attendance'),'data'=>"attendance"]),
            Column::make(['name'=>'chair','title'=>__('svu.chair'),'data'=>"chair"]),
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
        return 'AllInvitations_' . date('YmdHis');
    }
}
