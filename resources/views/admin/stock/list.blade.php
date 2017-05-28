@extends('admin.master')
@section('controller')Tin rao bán
@endsection()
@section('action')Danh sách
@endsection()
@section('content')
<table class="table table-hover" id="dataTables">
    <thead class="thead-inverse">
        <tr align="center">
            <th>Stt</th>
            <th>Tên tin rao bán</th>
            <th>Người đăng</th>
            <th>Ngày đăng</th>
            <!-- <th>Bị báo cáo</th> -->
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $page = $data;
            $stt = ($page->currentPage() - 1) * $page->perPage();
        ?>
        @foreach($data as $item)
        <?php
            $stt = $stt + 1;
            $user = App\Models\User::where('id','=',$item->user_id)->value('username');
        ?>
        <tr>
            <th>{!! $stt !!}</th>
            <td>{!! $item->name !!}</td>
            <td>{!! $user !!}</td>
            <td>{!! $item->created_at !!}</td>
            <!-- <td>temp</td> -->
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmation('Có xóa stock {!! $item->name !!} không?')" href="{!! URL::route('admin.stock.getDelete',$item->id) !!}"> Xóa</a></td>
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