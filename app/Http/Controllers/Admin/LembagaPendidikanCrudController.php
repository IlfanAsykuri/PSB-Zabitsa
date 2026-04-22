<?php

namespace App\Http\Controllers\Admin;

use App\Models\LembagaPendidikan;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LembagaPendidikanCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        // RBAC: logistik and pengasramaan are completely denied
        if (backpack_user()->hasAnyRole(['logistik', 'pengasramaan'])) {
            $this->crud->denyAccess(['list', 'create', 'update', 'delete', 'show']);
        }
        // admin, psb: full access

        CRUD::setModel(LembagaPendidikan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lembaga-pendidikan');
        CRUD::setEntityNameStrings('lembaga pendidikan', 'lembaga pendidikan');
    }

    protected function setupListOperation()
    {
        CRUD::column('kode_lembaga')->label('Kode');
        CRUD::column('nama_lembaga')->label('Nama Lembaga');
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
        CRUD::field('kode_lembaga')->label('Kode Lembaga')->type('text');
        CRUD::field('nama_lembaga')->label('Nama Lembaga')->type('text');
        CRUD::field([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['aktif' => 'Aktif', 'tidak' => 'Tidak Aktif'],
            'allows_null' => false,
        ]);
    }
}
