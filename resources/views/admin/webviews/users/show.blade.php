@extends('admin.layout.admin')
@section('content')

<div class="card1">
    <div class="card-header">
        {{ trans('global.show') }} Employee Detail
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
				<!-- <tr>
                    <th>
                       Employee Id
                    </th>
                    <td>
                        {{ $user->emp_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>-->
                <tr>
                    <th>
                        {{ trans('global.user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
			<!--	<tr>
                    <th>
                       Phone
                    </th>
                    <td>
                        {{ $user->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Company Name
                    </th>
                    <td>
                        {{ $user->company_name }}
                    </td>
                </tr>
				<tr>
                    <th>
                       Designation
                    </th>
                    <td>
                        {{ $user->designation }}
                    </td>
                </tr>-->
                 
            </tbody>
        </table>
    </div>
</div>

@endsection