@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th>Kích Hoạt</th>
                <th style="width: 150px">Cập Nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{!! $user->status == 1 ? '<span class="badge badge-success">Có</span>' : '<span class="badge badge-danger">Không</span>' !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/user01/edit/{{ $user->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                         <!-- Form for delete -->
                         <a class="btn btn-danger btn-sm"
                            href="#"
                            onclick="removeRow({{ $user->id }}, '{{ route('admin.user01.destroy', ['id' => $user->id]) }}')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
@endsection
