@extends('admin.layout.admin')
@section('content')

<div class="card1">
    <div class="card-header">
        {{ trans('global.edit') }} Employee
    </div>

    <div class="card-body">
        <form action="{{ route("users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
			<!-- <div class="col-lg-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Employee Id *</label>
                <input type="text" id="emp_id" name="emp_id"  class="form-control" required value="{{ old('name', isset($user) ? $user->emp_id : '') }}">
                @if($errors->has('emp_id'))
                    <p class="help-block">
                        {{ $errors->first('emp_id') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div>-->
          <!--  <div class="col-lg-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div> -->
            <div class="col-lg-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control"  required value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.email_helper') }}
                </p>
            </div>
			<!--<div class="col-lg-6 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Phone *</label>
                <input type="text" id="phone" name="phone" class="form-control" required  value="{{ old('email', isset($user) ? $user->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
 
            </div> 
			<div class="col-lg-6 form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                <label for="phone">Company Name *</label>
                <input type="text" id="company_name" name="company_name" required class="form-control" value="{{ old('email', isset($user) ? $user->company_name : '') }}">
                @if($errors->has('company_name'))
                    <p class="help-block">
                        {{ $errors->first('company_name') }}
                    </p>
                @endif
                
            </div>
			<div class="col-lg-6 form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                <label for="phone">Designation *</label>
                <input type="text" id="designation" name="designation" required class="form-control" value="{{ old('email', isset($user) ? $user->designation : '') }}">
                @if($errors->has('designation'))
                    <p class="help-block">
                        {{ $errors->first('designation') }}
                    </p>
                @endif
                
            </div>
            <div class="col-lg-6 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
            -->
            <div class="col-lg-12">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
			</div>
        </form>
    </div>
</div>

@endsection