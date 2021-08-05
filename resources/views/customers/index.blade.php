@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phonenumber }}</td>
                <td>{{ $customer->email  }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>
                {{ $customers->links() }}
            </td>
        </tr>
    </table>

@endsection