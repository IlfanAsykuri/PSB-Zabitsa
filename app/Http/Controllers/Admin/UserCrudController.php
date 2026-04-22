<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        // RBAC: ONLY admin can access this CRUD
        if (!backpack_user()->hasRole('admin')) {
            $this->crud->denyAccess(['list', 'create', 'update', 'delete', 'show']);
        }

        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('pengguna', 'pengguna');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Nama Lengkap');
        CRUD::column([
            'name'  => 'username',
            'label' => 'Username',
            'type'  => 'text',
        ]);

        // Menampilkan Role Spatie di tabel menggunakan relasi bawaan
        CRUD::column([
            'name'      => 'roles',
            'label'     => 'Role',
            'type'      => 'select_multiple',
            'entity'    => 'roles',
            'attribute' => 'name',
            'model'     => config('permission.models.role'),
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->addUserFields(true);
    }

    protected function setupUpdateOperation()
    {
        $this->addUserFields(false);
    }

    private function addUserFields(bool $isCreate)
    {
        CRUD::field('name')->label('Nama Lengkap')->type('text');

        CRUD::field([
            'name'  => 'username',
            'label' => 'Username',
            'type'  => 'text',
        ]);

        CRUD::field([
            'name'  => 'password',
            'label' => $isCreate ? 'Password' : 'Password (kosongkan jika tidak ingin diubah)',
            'type'  => 'password',
        ]);

        // Konfigurasi field yang BENAR agar Backpack otomatis menyimpan ke tabel model_has_roles
        CRUD::field([
            'name'      => 'roles',
            'label'     => 'Role / Hak Akses',
            'type'      => 'checklist', // Menampilkan pilihan role berupa checkbox
            'entity'    => 'roles',
            'attribute' => 'name',
            'model'     => config('permission.models.role'),
            'pivot'     => true, // SANGAT PENTING: Perintah otomatis simpan ke tabel pivot Spatie
        ]);
    }

    public function store()
    {
        $this->handlePasswordInput(request());
        return $this->traitStore();
    }

    public function update()
    {
        $this->handlePasswordInput(request());
        return $this->traitUpdate();
    }

    protected function handlePasswordInput($request)
    {
        // Enkripsi password baru, atau buang dari request jika dikosongkan (saat update)
        if ($request->filled('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }
    }
}
