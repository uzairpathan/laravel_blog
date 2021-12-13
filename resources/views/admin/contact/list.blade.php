@extends('layout/layout')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h2>Contact List</h2>
                            <span class="ml-1"></span>
                        </div>
                    </div>
                </div>
                <!-- row -->

                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List of Conatcts</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th width="10%">Sr.NO</th>
                                                <th width="20%">Name</th>
                                                <th width="20%">Email</th>
                                                <th width="25%">Mobile</th>
                                                <th width="20%">Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result as $val)
                                            <tr>
                                                <td>{{ $val->id }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>{{ $val->mobile }}</td>
                                                <td>{{ $val->message }}</td>
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