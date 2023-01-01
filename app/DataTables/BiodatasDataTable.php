<?php

namespace App\DataTables;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BiodatasDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($biodata) {
                $btnDetail = '<a href="'.route('dashboard.dataSiswa', $biodata->id).'" class="btn btn-sm btn-primary">Detail</a>';
                $confirm = "return confirm('apakah kamu yakin ingin menghapus data ini?')";
                $btnDelete = '
                        <form class="m-0" action="'.route('dashboard.dataSiswa.delete', $biodata->id).'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                        <button onclick="'.$confirm.'" type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                ';
                $div = '
                        <div class="d-flex justify-content-around align-items-center gap-3">
                            '.$btnDetail.'
                            '.$btnDelete.'
                        </div>
                ';
                return $div;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Biodata $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Biodata $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('biodatas-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        // Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                    ->width(10),
            Column::make('no_seleksi')
                    ->title('Nomor Seleksi'),
            Column::make('nisn'),
            Column::make('nama'),
            Column::make('email'),
            Column::make('nomor_hp'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Biodatas_' . date('YmdHis');
    }
}
