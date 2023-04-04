@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
				<?php	 $block=DB::table('block_url')->first();  ?>
					<h1>{!! $block->content !!}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
