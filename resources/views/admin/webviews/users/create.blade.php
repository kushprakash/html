@extends('admin.layout.admin')
@section('content')

<div class="card1">
    <div class="card-header">
        {{ trans('global.create') }} Employee
    </div>

    <div class="card-body">
		
		<form action="{{ route('users-excel') }}" method="POST"  class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <div class="custom-file text-left">
					 <label>Bulk Upload <span style="color:red;font-weight:800">(.Csv file)</span></label>
					
                    <input type="file" name="file" class="  form-control" id="customFile" onchange="ValidateSingleInput(this)" accept=".csv"  required>
                    
                </div>
            </div>
            <button class="btn btn-primary">Import Employee</button>
             
        </form>
		
		
		
		
        <form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
			
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
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($user) ? $user->name : '') }}" 		pattern="[a-z\s]{1,15}"

		title="Name should only contain lowercase letters. e.g. john">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div>-->
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
                <input type="text" maxlength="10" pattern="[6-9]{1}[0-9]{9}"  id="phone" name="phone" class="form-control" required value="{{ old('email', isset($user) ? $user->phone : '') }}">
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
            </div>-->
            
            <div class="col-lg-12">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
			</div>
        </form>
    </div>
</div>
<script>
	
	
	
	document.getElementById('e').valueAsDate = new Date();
  	//document.getElementById('e').value=new Date();
</script>
<script>
	var _validFileExtensions = [".csv"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
    </script>
@endsection