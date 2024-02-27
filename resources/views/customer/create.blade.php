@extends('layouts.adminpage')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer Record</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customers') }}">Customers</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('createCustomer') }}">Create</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-6 col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Customer</h3>
                            </div>
                            <!-- /.card-header -->
                            <x-flash-message />
                            <!-- form start -->
                            <form action="/customers" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                  

                            <!-- Meter Number -->
                            <div class="form-group">
                                <label for="meter_number">Meter Number</label>
                                <input type="text" class="form-control {{ $errors->has('meter_number') ? 'is-invalid' : '' }}" id="meter_number" placeholder="Meter Number"
                                    name="meter_number" value="{{ old('meter_number') }}" >
                            </div>
                            @error('meter_number')
                                <p class="text-red-500 text-xs mt-0  text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control  {{ $errors->has('firstname') ? 'is-invalid' : '' }}" id="firstname" placeholder="First Name"
                                    name="firstname" value="{{ old('firstname') }}">
                            </div>
                            @error('firstname')
                                <p class="text-red-500 text-xs mt-0  text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                            <!-- Middle Name -->
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input type="text" class="form-control  {{ $errors->has('middlename') ? 'is-invalid' : '' }}" id="middlename" placeholder="Middle Name"
                                    name="middlename" value="{{ old('middlename') }}">
                            </div>
                            @error('middlename')
                                <p class="text-red-500 text-xs mt-0  text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control  {{ $errors->has('lastname') ? 'is-invalid' : '' }}" id="lastname" placeholder="Last Name"
                                    name="lastname" value="{{ old('lastname') }}">
                            </div>
                            @error('lastname')
                                <p class="text-red-500 text-xs mt-0  text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <select class="form-control   {{ $errors->has('civil_status') ? 'is-invalid' : '' }}" name="civil_status">
                                    <option selected disabled>Select</option>
                                    <option value="single" {{ old('civil_status') === 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ old('civil_status') === 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="widowed" {{ old('civil_status') === 'widowed' ? 'selected' : '' }}>Widowed</option>
                                </select>
                            </div>

                            @error('civil_status')
                                <p class="text-red-500 text-xs mt-1  text-danger">
                                    {{ $message }}
                                </p>
                            @enderror


                                <!-- Purok -->
                                <div class="form-group">
                                    <label for="purok">Purok</label>
                                    <input type="text" class="form-control   {{ $errors->has('purok') ? 'is-invalid' : '' }}" id="purok" name="purok" placeholder="Purok"
                                        value="{{ old('purok') }}">
                                </div>
                                @error('purok')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Setio -->
                                <div class="form-group">
                                    <label for="setio">Setio</label>
                                    <input type="text" class="form-control   {{ $errors->has('setio') ? 'is-invalid' : '' }}" id="setio" name="setio" placeholder="Setio"
                                        value="{{ old('setio') }}">
                                </div>
                                @error('setio')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                               <!-- Barangay -->
                                <div class="form-group">
                                    <label for="barangay">Barangay</label>
                                    <select class="form-control   {{ $errors->has('barangay') ? 'is-invalid' : '' }}" name="barangay">
                                        <option value="" selected disabled>Select Barangay</option>

                                        <option value="Agay-ay" {{ old('barangay') === 'Agay-ay' ? 'selected' : '' }}>Agay-ay</option>
                                        <option value="Basak" {{ old('barangay') === 'Basak' ? 'selected' : '' }}>Basak</option>
                                        <option value="Bobon A" {{ old('barangay') === 'Bobon A' ? 'selected' : '' }}>Bobon A</option>
                                        <option value="Bobon B" {{ old('barangay') === 'Bobon B' ? 'selected' : '' }}>Bobon B</option>
                                        <option value="Dayanog" {{ old('barangay') === 'Dayanog' ? 'selected' : '' }}>Dayanog</option>
                                        <option value="Garrido" {{ old('barangay') === 'Garrido' ? 'selected' : '' }}>Garrido</option>
                                        <option value="Minoyho" {{ old('barangay') === 'Minoyho' ? 'selected' : '' }}>Minoyho</option>
                                        <option value="Osao" {{ old('barangay') === 'Osao' ? 'selected' : '' }}>Osao</option>
                                        <option value="Pong-oy" {{ old('barangay') === 'Pong-oy' ? 'selected' : '' }}>Pong-oy</option>
                                        <option value="San Jose" {{ old('barangay') === 'San Jose' ? 'selected' : '' }}>San Jose</option>
                                        <option value="San Roque" {{ old('barangay') === 'San Roque' ? 'selected' : '' }}>San Roque</option>
                                        <option value="San Vicente" {{ old('barangay') === 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
                                        <option value="Santa Cruz" {{ old('barangay') === 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
                                        <option value="Santa Filomena" {{ old('barangay') === 'Santa Filomena' ? 'selected' : '' }}>Santa Filomena</option>
                                        <option value="Santo Niño" {{ old('barangay') === 'Santo Niño' ? 'selected' : '' }}>Santo Niño</option>
                                        <option value="Somoje" {{ old('barangay') === 'Somoje' ? 'selected' : '' }}>Somoje</option>
                                        <option value="Sua" {{ old('barangay') === 'Sua' ? 'selected' : '' }}>Sua</option>
                                        <option value="Timba" {{ old('barangay') === 'Timba' ? 'selected' : '' }}>Timba</option>
                                    </select>
                                </div>

                                @error('barangay')
                                    <p class="text-red-500 text-xs mt-0 text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror


                                <!-- Contact Number -->
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="tel" class="form-control   {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" id="contact_number" name="contact_number"
                                        value="{{ old('contact_number') }}" required>
                                </div>
                                @error('contact_number')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Connection Status</label>
                                    <select class="form-control   {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status">
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="active"  {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="disconnected"  {{ old('status') === 'disconnected' ? 'selected' : '' }}>Disconnected</option>
                                        <option value="cut"  {{ old('status') === 'cut' ? 'selected' : '' }}>Cut</option>
                                    </select>
                                </div>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Type -->
                                <div class="form-group">
                                    <label for="type">Connection Type</label>
                                    <select class="form-control   {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="residential" {{ old('type') === 'residential' ? 'selected' : '' }}>Residential</option>
                                        <option value="commercial"  {{ old('type') === 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    </select>
                                </div>
                                @error('type')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Establishment Name -->
                                <div class="form-group">
                                    <label for="establishment_name">Establishment Name (if Commercial)</label>
                                    <input type="text" class="form-control   {{ $errors->has('establishment_name') ? 'is-invalid' : '' }}" id="establishment_name" name="establishment_name"
                                        value="{{ old('establishment_name') }}">
                                </div>
                                @error('establishment_name')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                 
                                     <!-- end div -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
