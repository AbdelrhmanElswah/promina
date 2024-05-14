<?php

namespace App\DataTables;

use App\Models\Album;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AlbumsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($album) {
                return view('admin.gallery.buttons.actions', ['id' => $album->id])->render();
            })
            ->addColumn('image', function ($album) {
                return '<img src="' . asset("{$album->images()->first()->image}") . '" height="50">';
            })            
            ->setRowId('id')
            ->rawColumns(['action', 'image']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Album $model): QueryBuilder
    {
        return $model->with('images')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('albums-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'asc') 
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['create'],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('image')->title('Image')->orderable(false)->searchable(false),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Albums_' . date('YmdHis');
    }
}
