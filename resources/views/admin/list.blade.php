@extends('layout/layout')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h2>List</h2>
                            <span class="ml-1"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                        </ol>
                    </div>
                    <h4><a href="./add">Add Post</a></h4>
                </div>
                <!-- row -->

                <div class="data_added">{{session('data_added')}}</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List of Pages</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th width="5%">Sr.NO</th>
                                                <th width="20%">Title</th>
                                                <th width="25%">Short Dec</th>
                                                <th width="20">Image</th>
                                                <th width="15%">date</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result as $val)
                                            <tr>
                                                <td>{{ $val->id }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td>{{ $val->short_dec }}</td>
                                                <td>{{ $val->image }}</td>
                                                <td>{{ $val->post_date }}</td>
                                                <td>
                                                    <a class="btn btn-primary">Edit</a>
                                                    <a class="btn btn-primary">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection