<?php

namespace App\Http\Controllers\Admin;

use App\Models\Santri;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

class SantriCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Santri::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/santri');
        CRUD::setEntityNameStrings('santri', 'data santri');

        // RBAC: logistik can only list and show
        if (backpack_user()->hasRole('logistik')) {
            $this->crud->denyAccess(['create', 'update', 'delete']);
        }
        // admin, psb, pengasramaan: full access
    }

    protected function setupListOperation()
    {
        $user = backpack_user();

        // Export button only for admin, psb, and pengasramaan
        if ($user->hasAnyRole(['admin', 'psb', 'pengasramaan'])) {
            $this->crud->addButtonFromView('top', 'export_excel', 'export_excel', 'end');
        }

        CRUD::column('kode_pendaftaran')->label('Kode')->searchLogic(function ($query, $column, $searchTerm) {
            $query->where('kode_pendaftaran', 'like', '%' . $searchTerm . '%');
        });
        CRUD::column('nama')->label('Nama Santri');
        CRUD::column('kode_lembaga')->label('Lembaga');
        CRUD::column('nama_pendidikan_terakhir')->label('Pend. Terakhir');
        CRUD::column('tahun_masuk')->label('Tahun Masuk');
        CRUD::column([
            'name' => 'status_kedatangan',
            'label' => 'Kedatangan',
            'type' => 'select_from_array',
            'options' => ['belum_datang' => 'Belum Datang', 'sudah_datang' => 'Sudah Datang'],
        ]);
        CRUD::column([
            'name' => 'status_verifikasi',
            'label' => 'Verifikasi',
            'type' => 'select_from_array',
            'options' => ['proses' => 'Proses', 'diverifikasi' => 'Diverifikasi', 'ditolak' => 'Ditolak'],
        ]);
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::column('tanggal_lahir')->label('Tanggal Lahir')->type('date');
        CRUD::column('negara')->label('Negara');
        CRUD::column('provinsi')->label('Provinsi');
        CRUD::column('kabupaten')->label('Kabupaten');
        CRUD::column('kecamatan')->label('Kecamatan');
        CRUD::column('desa')->label('Desa');
        CRUD::column('nama_wali')->label('Nama Wali');
        CRUD::column('nomor_wa_wali')->label('No. WA Wali');
    }

    protected function setupCreateOperation()
    {
        $this->setupFormFields();
    }

    protected function setupUpdateOperation()
    {
        $user = backpack_user();

        if ($user->hasRole('pengasramaan')) {
            // ONLY allow editing status_kedatangan
            CRUD::field([
                'name' => 'status_kedatangan',
                'label' => 'Status Kedatangan',
                'type' => 'select_from_array',
                'options' => ['belum_datang' => 'Belum Datang', 'sudah_datang' => 'Sudah Datang'],
                'allows_null' => false,
            ]);
        } elseif ($user->hasRole('psb')) {
            $this->setupFormFields();
            // PSB can also update verifikasi
            CRUD::field([
                'name' => 'status_verifikasi',
                'label' => 'Status Verifikasi',
                'type' => 'select_from_array',
                'options' => ['proses' => 'Proses', 'diverifikasi' => 'Diverifikasi', 'ditolak' => 'Ditolak'],
                'allows_null' => false,
            ]);
        } else {
            $this->setupFormFields();
        }
    }

    private function setupFormFields()
    {
        CRUD::field('kode_pendaftaran')->label('Kode Pendaftaran')->type('text')->attributes(['readonly' => 'readonly', 'placeholder' => 'Auto-generate saat simpan']);
        CRUD::field([
            'name' => 'kode_lembaga',
            'label' => 'Lembaga Pendidikan',
            'type' => 'select_from_array',
            'options' => \App\Models\LembagaPendidikan::where('status', 'aktif')->pluck('nama_lembaga', 'kode_lembaga')->toArray(),
            'allows_null' => false,
        ]);
        CRUD::field('nama')->label('Nama Lengkap')->type('text');
        CRUD::field('tanggal_lahir')->label('Tanggal Lahir')->type('date');
        CRUD::field('nama_pendidikan_terakhir')->label('Pendidikan Terakhir')->type('text');
        CRUD::field('negara')->label('Negara')->type('text')->default('Indonesia');
        CRUD::field('provinsi')->label('Provinsi')->type('text');
        CRUD::field('kabupaten')->label('Kabupaten/Kota')->type('text');
        CRUD::field('kecamatan')->label('Kecamatan')->type('text');
        CRUD::field('desa')->label('Desa/Kelurahan')->type('text');
        CRUD::field('nama_wali')->label('Nama Wali')->type('text');
        CRUD::field('nomor_wa_wali')->label('No. WA Wali')->type('text');
        CRUD::field('tahun_masuk')->label('Tahun Masuk')->type('number')->default(date('Y'));
        CRUD::field([
            'name' => 'status_kedatangan',
            'label' => 'Status Kedatangan',
            'type' => 'select_from_array',
            'options' => ['belum_datang' => 'Belum Datang', 'sudah_datang' => 'Sudah Datang'],
            'allows_null' => false,
        ]);
        CRUD::field([
            'name' => 'status_verifikasi',
            'label' => 'Status Verifikasi',
            'type' => 'select_from_array',
            'options' => ['proses' => 'Proses', 'diverifikasi' => 'Diverifikasi', 'ditolak' => 'Ditolak'],
            'allows_null' => false,
        ]);
    }
}
