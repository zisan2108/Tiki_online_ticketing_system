@extends('admin.layouts.master')

@section('content')
    <style>
        td a i {
            font-size: 15px;
        }
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Ticket</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Ticket</h4>
                            <div class="card-header-action">
                                <a href="{{ route('create-ticket.index') }}" class="btn btn-primary">Create Ticket</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Desciption</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                @foreach ($ticket as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        @if($item->status == 1)
                                        <td><span class="badge badge-success">Active</span></td>
                                        @else
                                        <td><span class="badge badge-info">Inactive</span></td>
                                        @endif
                                      

                                        <td><a class="btn btn-info m-1" href="{{ route('edit-ticket', $item->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td>
                                            <a class="btn btn-light m-1 delete-item"
                                                href="{{ route('destroy-ticket', $item->id) }}"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
