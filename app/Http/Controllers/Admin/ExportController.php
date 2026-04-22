<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SantriExport;
use App\Exports\SantriLogistikExport;

class ExportController extends Controller
{
    public function exportSantri()
    {
        // Santri export: admin, psb, pengasramaan
        if (!backpack_user()->hasAnyRole(['admin', 'psb', 'pengasramaan'])) {
            abort(403, 'Unauthorized access.');
        }
        return Excel::download(new SantriExport, 'data_santri_' . date('Y-m-d') . '.xlsx');
    }

    public function exportLogistik()
    {
        // Logistik export: admin, psb, logistik
        if (!backpack_user()->hasAnyRole(['admin', 'psb', 'logistik'])) {
            abort(403, 'Unauthorized access.');
        }
        return Excel::download(new SantriLogistikExport, 'data_logistik_santri_' . date('Y-m-d') . '.xlsx');
    }
}
