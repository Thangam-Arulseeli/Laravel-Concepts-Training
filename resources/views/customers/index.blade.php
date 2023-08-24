 {{-- <h3> Customer Name List - Traditional PHP syntax </h3>
<ul> 
    <?php
        // Traditional PHP syntax to display passed data
        foreach ($customerlist as $customer){
             echo "<li>" . $customer . "</li>";
         }
        ?>
</ul> 
-------------------------------------     --}}

{{-- @extends('layout')
@section('content')
  @section('title')
    Customer Details - BrisksLine
  @endsection --}}
  {{-- <h3> Customer Name List - Laravel blade syntax </h3>
  <h4> This is the basis of Restful Controller </h4>  --}}
  <!-- Laravel blade sytax to display data for simpler and cleaner code -->
  
  {{-- 1. // Display Static / Dynamic values from Customers Controller 
  <h3> Customer Details </h3>
  <ul>
  @foreach ($customerlist as $customer) --}}
   {{-- <li> {{$customer}} </li> --}}   {{-- Prints customer names --}}
  {{-- @endforeach --}}

  
  {{--2.  // Display all the customer records from controller 
  <h3> Customer Details </h3>
  <ul>
  @foreach ($customerlist as $customer) --}}
   {{-- <li> {{$customer}} </li> --}}   {{-- Prints entire table records --}}
    {{-- <li> {{$customer->name }} :: <span class="text-muted">  {{ $customer->age }}  ---- {{ $customer->address}}  ----- {{$customer->contactno}}  ----- {{$customer->email}} </span> </li>
  @endforeach

  {{-- 3. Display the customer records based on filers - Where condition --}}
     {{-- <h3> Active Customer Details </h3>
  <ul>
  @foreach ($activeCustomers as $customer)
      <li> {{$customer->name }} :: <span class="text-muted">  {{ $customer->age }}  ---- {{ $customer->address}}  ----- {{$customer->contactno}}  ----- {{$customer->email}} </span> </li>
  @endforeach
  </ul>  

  <h3> Inactive Customer Details </h3>
  <ul>
  @foreach ($inactiveCustomers as $customer)
       <li> {{$customer->name }} :: <span class="text-muted">  {{ $customer->age }}  ---- {{ $customer->address}}  ----- {{$customer->contactno}}  ----- {{$customer->email}} </span> </li>
  @endforeach
  </ul>   
  @endsection
  --}}


  {{-- 4. Display the web form to get customer details and display customer records based on filers --}}
  @extends('layout')
 @section('content') 
 @section('title')
    Customer Details - BrisksLine
  @endsection 
 <div class="container">
    <form action="customers" method="post" >
    <div class="row">
        <div class="col-5">

    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Customer Name:</label>
        <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" autocomplete="off" value="{{old('name')}}">
        {{$errors->first('name')}}
    </div>
  <div class="mb-3">
    <label for="age" class="form-label">Age:</label>
    <input type="text" class="form-control" id="" placeholder="Enter Age" name="age" autocomplete="off" value="{{old('age')}}">
    {{$errors->first('age')}}
</div>
    <div class="mb-3 mt-3">
    <label for="address" class="form-label">Address:</label>
    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" autocomplete="off" value="{{old('address')}}">
    {{$errors->first('address')}}
  </div>
  <div class="mb-3">
    <label for="contactno" class="form-label">contact No:</label>
    <input type="text" class="form-control" id="contactno" placeholder="Enter Contact No." name="contactno" value="{{old('contactno')}}">
    {{$errors->first('contactno')}}
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Mail ID:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter MailID" name="email" autocomplete="off" value="{{old('email')}}">
    {{$errors->first('email')}}
  </div> 
  <div class="mb-3">
    <label for="active" class="form-label">Activeness :</label>
    <select name="active" id="">
        <option value="" disabled> Select Customer Status </option>
        <option value="1"> Active </option>
        <option value="0"> Inactive </option>
    </select>
    {{$errors->first('active')}}
</div>

<div class="mb-3 mt-3">
  <label for="companyid" class="col-sm-2">Company Name: </label>
  <div class="col-sm-10">
  <select name="companyid" id="companyid">
      <option value="" disabled> Select Company ID </option>
      @foreach($companies as $company)
          <option value="{{$company->id}}"> {{$company->cpyname}} </option>
      @endforeach
  </select>
  </div>
</div>

  <div class="mb-3"> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </div>
    </div>
@csrf 
</form> 
 </div>
 <hr>
<h4> Active Customer List </h4>
<div class="row">
    <div class="col-6">
        <h3> Active Customer list </h3>
    <ul>
        @foreach ($activeCustomers as $customer) 
              <li> {{$customer -> name }} ----- <span class="text-muted"> {{ $customer-> age }} -- {{ $customer->address}} -- -- {{$customer->contactno}} -- {{ $customer->email }} -- {{ $customer->active  }}</span> </li>
       @endforeach
    </ul>
    </div>
  <div class="col-6">
    <h3> Inactive Customer List  </h3>
    <ul>
        @foreach($inactiveCustomers as $customer)
            <li> {{$customer -> name }} ----- <span class="text-muted"> {{ $customer-> age }} -- {{ $customer->address}} -- -- {{$customer->contactno}} -- {{ $customer->email }} -- {{ $customer->active  }}</span> </li>
        @endforeach
    </ul>
  </div>
</div>
 
@endsection 


