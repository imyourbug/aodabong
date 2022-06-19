@extends('admin.users.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã người dùng</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Cập nhật lần cuối</th>
                <th>Lựa chọn</th>
            </tr>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at === null ? '' : $user->updated_at->format('H:m:s d-m-Y') }}</td>
                    <td><a class="btn btn-primary btn-sm" href='/admin/users/edit/{{ $user->id }}'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{ $user->id }}', '/admin/users/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
@endsection
