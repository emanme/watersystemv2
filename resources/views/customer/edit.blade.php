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
                            <li class="breadcrumb-item"><a href="{{ route('editCustomer', ['customer' => $customer->id]) }}">Edit</a></li>
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
                                <h3 class="card-title">Edit Customer</h3>
                            </div>
                            <!-- /.card-header -->
                            <x-flash-message />
                            <!-- form start -->
                            <form action="/customers/{{ $customer->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <!-- Account Number -->
                                    <div class="form-group">
                                        <label for="accountnumber">Account Number</label>
                                        <input type="text" class="form-control" id="accountnumber"
                                            placeholder="Account Number"  name="account_number" value="{{ $customer->account_number }}" disabled>
                                    </div>
                                    @error('account_number')
                                        <p class="text-red-500 text-xs mt-0  text-danger">
                                            {{ $message }}
                                        </p>
                                     @enderror

                                      <!-- Meter Number -->
                                    <div class="form-group">
                                        <label for="meter_number">Meter Number</label>
                                        <input type="text" class="form-control" id="meter_number"
                                            placeholder="Meter Number"  name="meter_number" value="{{ $customer->meter_number }}" disabled>
                                    </div>
                                    @error('meter_number')
                                        <p class="text-red-500 text-xs mt-0  text-danger">
                                            {{ $message }}
                                        </p>
                                     @enderror

                                   <!-- First Name -->
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname"
                                            placeholder="First Name"  name="firstname" value="{{ $customer->firstname }}" >
                                    </div>
                                    @error('firstname')
                                        <p class="text-red-500 text-xs mt-0  text-danger">
                                            {{ $message }}
                                        </p>
                                     @enderror


                                   <!-- Middle Name -->
                                   <div class="form-group">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" class="form-control" id="middlename"
                                        placeholder="Middle Name"  name="middlename" value="{{ $customer->middlename }}" >
                                </div>
                                @error('middlename')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                 @enderror


                                   <!-- Last Name -->
                                   <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname"
                                        placeholder="Last Name"  name="lastname" value="{{ $customer->lastname }}" >
                                </div>
                                @error('lastname')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                 @enderror

                                 <div class="form-group">
                                    <label for="civil_status">Civil Status</label>
                                    <select class="form-control" name="civil_status">
                                    <option selected disabled>Select</option>
                                    <option value="single"
                                    {{ $customer->civil_status === 'single' ? 'selected' : '' }}>Single
                                    </option>
                                    <option value="married"
                                        {{ $customer->civil_status === 'married' ? 'selected' : '' }}>Married
                                    </option>
                                    <option value="widowed"
                                        {{ $customer->civil_status === 'widowed' ? 'selected' : '' }}>Widowed
                                    </option>
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
                                    <input type="text" class="form-control" id="purok" name="purok" placeholder="Purok"
                                        value="{{ $customer->purok }}">
                                </div>
                                @error('purok')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Setio -->
                                <div class="form-group">
                                    <label for="setio">Setio</label>
                                    <input type="text" class="form-control" id="setio" name="setio" placeholder="Setio"
                                        value="{{ $customer->setio }}">
                                </div>
                                @error('setio')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Barangay -->
                                <div class="form-group">
                                    <label for="barangay">Barangay</label>
                                    <select class="form-control" name="barangay">
                                        <option value="" selected disabled>Select Barangay</option>

                                            <option value="Agay-ay"
                                                {{ $customer->barangay === 'Agay-ay' ? 'selected' : '' }}>Agay-ay</option>
                                            <option value="Basak" {{ $customer->barangay === 'Basak' ? 'selected' : '' }}>
                                                Basak</option>
                                            <option value="Bobon A"
                                                {{ $customer->barangay === 'Bobon A' ? 'selected' : '' }}>Bobon A</option>
                                            <option value="Bobon B"
                                                {{ $customer->barangay === 'Bobon B' ? 'selected' : '' }}>Bobon B</option>
                                            <option value="Dayanog"
                                                {{ $customer->barangay === 'Dayanog' ? 'selected' : '' }}>Dayanog</option>
                                            <option value="Garrido"
                                                {{ $customer->barangay === 'Garrido' ? 'selected' : '' }}>Garrido</option>
                                            <option value="Minoyho"
                                                {{ $customer->barangay === 'Minoyho' ? 'selected' : '' }}>Minoyho</option>
                                            <option value="Osao" {{ $customer->barangay === 'Osao' ? 'selected' : '' }}>
                                                Osao</option>
                                            <option value="Pong-oy"
                                                {{ $customer->barangay === 'Pong-oy' ? 'selected' : '' }}>Pong-oy</option>
                                            <option value="San Jose"
                                                {{ $customer->barangay === 'San Jose' ? 'selected' : '' }}>San Jose
                                            </option>
                                            <option value="San Roque"
                                                {{ $customer->barangay === 'San Roque' ? 'selected' : '' }}>San Roque
                                            </option>
                                            <option value="San Vicente"
                                                {{ $customer->barangay === 'San Vicente' ? 'selected' : '' }}>San Vicente
                                            </option>
                                            <option value="Santa Cruz"
                                                {{ $customer->barangay === 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz
                                            </option>
                                            <option value="Santa Filomena"
                                                {{ $customer->barangay === 'Santa Filomena' ? 'selected' : '' }}>Santa
                                                Filomena</option>
                                            <option value="Santo Niño"
                                                {{ $customer->barangay === 'Santo Niño' ? 'selected' : '' }}>Santo Niño
                                            </option>
                                            <option value="Somoje"
                                                {{ $customer->barangay === 'Somoje' ? 'selected' : '' }}>Somoje</option>
                                            <option value="Sua" {{ $customer->barangay === 'Sua' ? 'selected' : '' }}>
                                                Sua</option>
                                            <option value="Timba"
                                                {{ $customer->barangay === 'Timba' ? 'selected' : '' }}>
                                                Timba</option>

                                    </select>
                                </div>
                                @error('barangay')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Contact Number -->
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="tel" class="form-control" id="contact_number" name="contact_number"
                                        value="{{ $customer->contact_number }}" required>
                                </div>
                                @error('contact_number')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Connection Status</label>
                                    <select class="form-control" name="status">
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="disconnected" {{ $customer->status === 'disconnected' ? 'selected' : '' }}>Disconnected</option>
                                        <option value="cut" {{ $customer->status === 'cut' ? 'selected' : '' }}>Cut</option>
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
                                    <select class="form-control" name="type">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="residential" {{ $customer->type === 'residential' ? 'selected' : '' }}>Residential</option>
                                        <option value="commercial" {{ $customer->type === 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    </select>
                                </div>
                                @error('type')
                                    <p class="text-red-500 text-xs mt-0  text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Establishment Name -->
                                <div class="form-group">
                                    <label for="establishment_name">Establishment Name</label>
                                    <input type="text" class="form-control" id="establishment_name" name="establishment_name"
                                        value="{{ $customer->establishment_name }}">
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
