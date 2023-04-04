@extends('admin.layout.admin')
@section('content')
 
    
<div class="card1">
    <div class="card-header">
        <div style="margin-bottom: 10px;" class="row">
        <div class="col-md-6">
          <h5 class=""> {{ trans('global.permission.title_singular') }} {{ trans('global.list') }}</h5>
           </div>
         <div class="col-md-6">
            <a class="btn btn-success pull-right" href="{{ route("permissions.create") }}">
                {{ trans('global.add') }} {{ trans('global.permission.title_singular') }}
            </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table  id="example" class=" table table-bordered table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.permission.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $permission->title ?? '' }}
                            </td>
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                
                                    <a class="btn btn-xs btn-info" href="{{ route('permissions.edit', $permission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
 