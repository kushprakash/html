@extends('admin.layout.admin')
@section('content')
 
 
<div class="card1">
    <div class="card-header">
        <div style="margin-bottom: 10px;" class="row">
        <div class="col-md-6">
          <h5 class="">  Employee {{ trans('global.list') }}</h5>
           </div>
         <div class="col-md-6">
            <a class="btn btn-success pull-right" href="{{ route("users.create") }}">
                {{ trans('global.add') }} Employee
            </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table  id="example" class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
						 
                       
                        <th>
                            {{ trans('global.user.fields.email') }}
                        </th>
                       
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
{{$key+1}}
                            </td>
							 
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            
                            <td>
								@if($user->is_active !=1)
								 <a class="btn btn-xs btn-success" href="{{ url('users-active/'.$user->id.'/'.'1') }}">
										Active
                                    </a>
								@else
								<a class="btn btn-xs btn-danger" href="{{ url('users-active/'.$user->id.'/'.'0') }}">
										Inactive
                                    </a>
								
								@endif
								
								
								
                                    <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}">
										<i class="fa fa-eye"></i>
                                    </a>
                                 
                                    <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) }}">
                                       <i class="fa fa-edit"></i>
                                    </a>
                              
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" ><i class='fa fa-trash'></i></button>
                                    </form>
                                
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
 