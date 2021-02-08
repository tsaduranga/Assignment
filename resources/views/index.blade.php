@extends('layouts.app')

@section('content')

    <div class="container">



        @if(session()->has('success'))
            <div class="alert alert-primary">
                {{ session()->get('success') }}
            </div>
        @endif



        <h2 class="text-center">All the Bank Branches </h2>



        <div style="margin-top:50px">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bank Name</th>
                        <th>Bank Code</th>
                        <th>Branch Name</th>
                        <th>Branch Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count =1 ?>
                    @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $branch['bank_name'] }}</td>
                            <td>{{ $branch['bank_code'] }}</td>
                            <td>{{ $branch['branch_name'] }}</td>
                            <td>{{ $branch['branch_code'] }}</td>
                            <td>
                                <a href="{{ route('bank-branches.edit', $branch['branch_id']) }}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i> edit</a>
                            </td>
                        </tr>

                        <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>



        </div>



    </div>





@endsection
