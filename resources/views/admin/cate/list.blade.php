@extends('admin.master')
@section('controller')Category
@endsection
@section('action')Danh sách
@endsection
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-hover" id="dataTables">
    <thead class="thead-inverse">
        <tr align="center">
            <th>Stt</th>
            <th>Tên</th>
            <th>Category chính</th>
            <th>Xóa</th>
            <!-- <th>Sửa</th> -->
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($data as $item)
        <?php $stt = $stt + 1 ?>
        <tr>
            <th>{!! $stt !!}</th>
            <td>{!! $item["name"] !!}</td>
            <td>
                @if ($item["parent_id"]==0)
                    {!! "None" !!}
                @else
                    <?php
                        $parent = DB::table('cates')->where('id',$item["parent_id"])->first();
                        echo $parent->name;
                    ?>
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmation('Có xóa category {!! $item['name'] !!} không?')" href="{!! URL::route('admin.cate.getDelete',$item['id']) !!}"> Xóa</a></td>
            {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Sửa</a></td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection