<?php

namespace App\DataTables;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaransDataTable extends DataTable
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
            ->addColumn('detail_pembayaran', function($pembayaran) {
                $detail = '<a href="' . route('dashboard.detailPembayaran', $pembayaran->id) . '">Detail</a>';
                return $detail;
            })->escapeColumns(['detail_pembayaran' => true])
            ->addColumn('bukti_pembayaran', function($pembayaran) {
                $bukti = '<a href="' . route('dashboard.buktiPembayaran', $pembayaran->id) . '">Bukti</a>';
                return $bukti;
            })->escapeColumns(['bukti_pembayaran' => true])
            ->setRowId('id')
            ->addColumn('no_seleksi', function($pembayaran) {
                return $pembayaran->biodata->no_seleksi;
            })
            ->addColumn('action', function($pembayaran) {
                if($pembayaran->status == NULL){
                    $btn = '
                        <form class="m-0" action="' . route('dashboard.pembayaran.verifikasi', $pembayaran->id) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('PUT') . '
                        <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                        </form>
                    ';
                    $btn .= '
                        <form class="m-0" action="' . route('dashboard.pembayaran.tolak', $pembayaran->id) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('PUT') . '
                        <input type="hidden" id="message" name="message">
                        <button type="submit" onclick="return tolak()" class="btn btn-sm btn-danger">Tolak</button>
                        </form>
                    ';
                }else{
                    $status = $pembayaran->status == 'di tolak' ? 'text-danger' : 'text-success';
                    $btn = '<p class="font-weight-bold '. $status .'">'. ucfirst($pembayaran->status) .'</p>';
                }
                $div = '
                    <div class="d-flex justify-content-around gap-3">
                        ' . $btn . '
                    </div>
                ';
                return $div;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pembayaran $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pembayaran $model): QueryBuilder
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
                    ->setTableId('pembayarans-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
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
                  ->width(10)
                    ->visible(false)
                  ,
            Column::make('no_seleksi'),
            Column::make('nama_pemilik'),
            Column::computed('bukti_pembayaran')
            ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
            Column::computed('detail_pembayaran')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Pembayarans_' . date('YmdHis');
    }
}
