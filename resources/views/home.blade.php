@extends('layouts.app')

@section('content')

    <div class="container">


        <h1 class="text-center">Welcome To Accounting System</h1>

        <div style="margin-top:150px">
            <h3 class="">Enter Bank Section: <a href="{{ route('bank-branches.index') }}" class="btn btn-primary btn-lg"> Here </a></h3>
        </div>



    </div>

@endsection
