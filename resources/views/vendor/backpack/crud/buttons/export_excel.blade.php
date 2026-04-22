@if(backpack_user()->hasAnyRole(['admin', 'psb']))
    <a href="{{ url($crud->route . '/export') }}" class="btn btn-success btn-sm" data-style="zoom-in" style="margin-left:5px;">
        <i class="la la-file-excel-o"></i> Export Excel
    </a>
@endif
