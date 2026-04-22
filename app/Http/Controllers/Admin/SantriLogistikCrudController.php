<?php

namespace App\Http\Controllers\Admin;

use App\Models\Santri;
use App\Models\SantriLogistik;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SantriLogistikCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(Santri::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/santri-logistik');
        CRUD::setEntityNameStrings('logistik santri', 'Manajemen logistik santri');

        // RBAC: admin, psb = full CRUD
        // logistik = read & update only (deny create, delete)
        // pengasramaan = read only (deny create, update, delete)
        if (backpack_user()->hasRole('logistik')) {
            $this->crud->denyAccess(['create', 'delete']);
        } elseif (backpack_user()->hasRole('pengasramaan')) {
            $this->crud->denyAccess(['create', 'update', 'delete']);
        }
    }

    protected function setupListOperation()
    {
        // Export button only for admin, psb, and logistik
        if (backpack_user()->hasAnyRole(['admin', 'psb', 'logistik'])) {
            $this->crud->addButtonFromView('top', 'export_excel', 'export_excel', 'end');
        }

        CRUD::column('kode_pendaftaran')->label('Kode Pendaftaran');
        CRUD::column('nama')->label('Nama Santri');

        CRUD::addColumn([
            'name'      => 'kode_lembaga',
            'label'     => 'Lembaga',
            'type'      => 'select',
            'entity'    => 'lembaga',
            'attribute' => 'nama_lembaga',
            'model'     => \App\Models\LembagaPendidikan::class,
        ]);

        CRUD::column('progress_logistik')->label('Progress Logistik')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->removeAllFields();

        CRUD::field([
            'name' => 'manage_logistik',
            'label' => 'Distribusi Item Logistik',
            'type' => 'view',
            'view' => 'vendor.backpack.crud.fields.manage_logistik'
        ]);
    }

    public function update()
    {
        $this->crud->hasAccessOrFail('update');
        $request = $this->crud->getRequest();

        $santriId = $request->input('kode_pendaftaran') ?? $this->crud->getCurrentEntryId();
        $santri = Santri::findOrFail($santriId);

        $logistikData = $request->input('logistik_data');

        if ($logistikData && is_array($logistikData)) {
            foreach ($logistikData as $kodeLogistik => $data) {
                \App\Models\SantriLogistik::updateOrCreate(
                    [
                        'kode_pendaftaran' => $santri->kode_pendaftaran,
                        'kode_logistik'    => $kodeLogistik
                    ],
                    [
                        'ukuran'            => $data['ukuran'] ?? null,
                        'status_penyerahan' => $data['status_penyerahan'] ?? 'belum_diserahkan',
                        'keterangan'        => $data['keterangan'] ?? null
                    ]
                );
            }
        }

        \Alert::success('Berhasil memperbarui status logistik santri (' . $santri->nama . ').')->flash();

        return redirect($this->crud->route);
    }

    protected function setupShowOperation()
    {
        $this->crud->removeAllColumns();

        $this->crud->addColumn([
            'name' => 'detail_logistik_view',
            'label' => 'Status Rekap',
            'type' => 'view',
            'view' => 'vendor.backpack.crud.columns.show_logistik'
        ]);
    }
}
