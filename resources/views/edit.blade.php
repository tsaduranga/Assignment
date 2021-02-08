@extends('layouts.app')

@section('content')

<div class="container">


    <div class="card card-custom gutter-b">
        <div class="card-body">
           <h3>Edit Branche</h3>
        </div>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @endif



    <div class="card card-custom gutter-b">
        <div class="card-body">

            <form method="post" action="{{ route('bank-branches.update', $branch['branch_id']) }}">
                @csrf
                @method('put')



                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="name">Select Bank   <span class="text-success">selectd bank : {{ $branch['bank_name'] }}</span></label>
                                <select id="inputState" class="form-control" name="bank" required >


                                    @foreach ($banks as $bank)
                                        @if($bank['bank_id'] == $branch['bank_is'])
                                            <option selected value="{{ $bank['bank_id'] }}">{{ $bank['bank_id'] }} dd</option>
                                        @else
                                            <option value="{{ $bank['bank_id'] }}">{{ $bank['bank_name'] }}</option>
                                        @endif
                                    @endforeach

                                </select>
                                    @error('bank')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>



                        <div class="form-row" style="display: flex;justify-content: space-between;margin-top:10px">
                            <div class="form-group col-5">
                            <label for="name">Branch Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail4" name="name" placeholder="Branch Name" value="{{ old('name') ?? $branch['branch_name']  }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-5">
                                <label for="current_password">Branch Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="inputEmail4" name="code" placeholder="Branch Code" value="{{ old('code') ?? $branch['branch_code']  }}">
                                    @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="name">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" >{{ old('address') ?? $branch['address'] }}</textarea>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>



                          <div class="form-row" style="margin-top: 50px">
                                    <div class="card-toolbar mr-5" style="float: right">
                                        <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                                    </div>
                          </div>



            </form>

        </div>
    </div>


</div>


@endsection
