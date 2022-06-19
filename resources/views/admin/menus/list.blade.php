@extends('admin.users.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th width="200px">Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Lựa chọn</th>
            </tr>
        <tbody>
            {!! App\Helpers\Helper::menu($menus) !!}
        </tbody>
        </thead>
    </table>
    {{-- {{ $menus->links() }} --}}
@endsection
