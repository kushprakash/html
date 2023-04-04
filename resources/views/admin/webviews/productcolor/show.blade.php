@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }}Product Detail
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                 
                 
                
                  <tr>
                    <th>
                   Product Name
                    </th>
                    <td> {{$product->name}}</td>
                 
                </tr>
                
                  
              
            </tbody>
        </table>
    </div>
</div>

@endsection