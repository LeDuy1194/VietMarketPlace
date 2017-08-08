@extends('admin.master')
@section('controller')Người dùng
@endsection()
@section('action')Danh sách
@endsection()
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-hover" id="dataTables">
    <thead class="thead-inverse">
        <tr align="center">
            <th>Stt</th>
            <th>Tài khoản</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Cấp bậc</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $page = $data;
            $stt = ($page->currentPage() - 1) * $page->perPage();
        ?>
        @foreach($data as $item_user)
        <?php $stt++ ?>
        <tr>
            <th>{!! $stt !!}</th>
            <td>{!! $item_user["username"] !!}</td>
            <td>{!! $item_user["email"] !!}</td>
            <td>{!! $item_user["phone"] !!}</td>
            <td>
                @if($item_user["level"] == 0)
                    Khách thường
                @elseif($item_user["level"] == 1)
                    Khách Vip
                @elseif($item_user["level"] == 2)
                    Quản lý viên
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmation('Có xóa người dùng {!! $item_user['username'] !!} không?')" href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}"> Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@if ($page->lastPage() > 1)
    <nav class="pagination-custom" aria-label="Page navigation">
        <ul class="pagination">
            @if ($page->currentPage() != 1)
                <li class="page-item"><a class="page-link" href="{!! $page->url($page->currentPage() - 1) !!}">Trước</a></li>
            @endif
            @for ($i = 1; $i <= $page->lastPage(); $i = $i + 1)
                <li class="page-item {!! ($page->currentPage() == $i)?'active':'' !!}">
                    <a class="page-link" href="{!! $page->url($i) !!}">{!! $i !!}</a>
                </li>
            @endfor
            @if ($page->currentPage() != $page->lastPage())
                <li class="page-item"><a class="page-link" href="{!! $page->url($page->currentPage() + 1) !!}">Sau</a></li>
            @endif
        </ul>
    </nav>
@endif
@endsection()