@extends('layout/layout')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h2>Page List</h2>
                            <span class="ml-1"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    </div>
                    <h4><a href="{{ url('admin/page/add') }}">Add Page</a></h4>
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
                                                <th width="15%">Sr.NO</th>
                                                <th width="20%">Name</th>
                                                <th width="20%">Slug</th>
                                                <th width="25%">Description</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result as $val)
                                            <tr>
                                                <td>{{ $val->id }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->slug }}</td>
                                                <td>{{ $val->description }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ url('admin/page/edit/'. $val->id) }}">Edit</a>
                                                    <a class="btn btn-primary" href="{{ url('admin/page/delete/'. $val->id) }}">Delete</a>
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