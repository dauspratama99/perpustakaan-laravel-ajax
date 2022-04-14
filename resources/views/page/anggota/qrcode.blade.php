@extends('layout.index')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row ">
        
      </div>
    </div>
  </div>


<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: azure">
                    <div class="float-left">
                        <h5>Scan Disini</h5>
                    </div>
                </div>

                <div class="card-body">
                    <center>
                        {!! $qrcode !!}
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection