@extends('admin.master')
@section('controller')Người dùng
@endsection()
@section('action')Danh sách
@endsection()
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>Stt</th>
            <th>Username</th>
            <th>Cấp bậc</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($user as $item_user)
        <?php $stt++ ?>
        <tr>
            <th>{!! $stt !!}</th>
            <td>{!! $item_user["username"] !!}</td>
            <td>
                @if($item_user["level"] == 1 && $item_user["id"] != 2)
                    Admin
                @elseif($item_user["id"] == 2)
                    Superadmin
                @else
                    Member
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmation('Có xóa người dùng {!! $item_user['username'] !!} không?')" href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item_user['id']) !!}">Sửa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()