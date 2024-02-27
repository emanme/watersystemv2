@extends('layouts.adminpage')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BILLINGS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="w ">
                                        <form method="GET" class="form-inline m-0 p-0 ">
                                            @csrf
                                            @php
                                                $searchQuery = request('search');
                                                $filled = $searchQuery ? 'is-filled' : '';
                                            @endphp
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Search" value="{{ $searchQuery }}">

                                            <div class="input-group-append ">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <x-flash-message />
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ACCOUNT NO.</th>
                                            <th>ACCOUNT</th>
                                            <th>LOCATION</th>
                                            <th>STATUS</th>
                                            <th>LAST PAYMENT</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @unless (count($customers) == 0)
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td><a href="/billings/{{ $customer->id }}/bill">{{ $customer['account_number'] }}
                                                    </td>
                                                    <td>{{ $customer['firstname'] }} {{ $customer['lastname'] }}</td>
                                                    <td>{{ $customer['purok'] }}
                                                        Brgy.
                                                        {{ $customer['barangay'] }}</td>
                                                    <td> @php
                                                        $statusColors = [
                                                            'active' => 'bg-gradient-success',
                                                            'disconnected' => 'bg-gradient-warning',
                                                            'cut' => 'bg-gradient-danger',
                                                        ];
                                                    @endphp

                                                        <span
                                                            class="badge badge-sm {{ $statusColors[$customer['status']] ?? '' }}">
                                                            {{ $customer['status'] }}
                                                        </span>
                                                    </td>
                                                    <td>12/12/2024
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <p class="text-warning">The customers data is empty.</p>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endunless
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
