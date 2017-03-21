@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                @if (Session::has('flash-message'))
                <div class="alert alert-success">
                    {!! Session::get('flash-message') !!}
                </div>
                @endif
            </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($user as $item_user)
                            <?php $stt++ ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
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
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick="return delconfirm('Delete this User')" href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item_user['id']) !!}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()