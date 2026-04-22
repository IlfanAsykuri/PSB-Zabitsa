<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logistik;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LogistikCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        // RBAC: pengasramaan is completely denied
        if (backpack_user()->hasRole('pengasramaan')) {
            $this->crud->denyAccess(['list', 'create', 'update', 'delete', 'show']);
        }
        // admin, psb, logistik: full access

        CRUD::setModel(Logistik::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/logistik');
        CRUD::setEntityNameStrings('item logistik', 'item logistik');
    }

    protected function setupListOperation()
    {
        CRUD::column('kode_logistik')->label('Kode');
        CRUD::column('nama_logistik')->label('Nama Item');
        CRUD::column([
            'name' => 'kategori',
            'label' => 'Kategori',
            'type' => 'select_from_array',
            'options' => ['seragam' => 'Seragam', 'buku' => 'Buku', 'lainnya' => 'Lainnya'],
        ]);
        CRUD::column([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['aktif' => 'Aktif', 'tidak' => 'Tidak Aktif'],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->addFormFields();
    }

    protected function setupUpdateOperation()
    {
        $this->addFormFields();
    }

    private function addFormFields()
    {
        CRUD::field('kode_logistik')->label('Kode Logistik')->type('text');
        CRUD::field('nama_logistik')->label('Nama Item')->type('text');
        CRUD::field([
            'name' => 'kategori',
            'label' => 'Kategori',
            'type' => 'select_from_array',
            'options' => ['seragam' => 'Seragam', 'buku' => 'Buku', 'lainnya' => 'Lainnya'],
            'allows_null' => false,
        ]);
        CRUD::field([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['aktif' => 'Aktif', 'tidak' => 'Tidak Aktif'],
            'allows_null' => false,
        ]);
    }
}
