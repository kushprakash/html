<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<div class="col-md-6"> 
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Vendor</h3>
      <a href="{{url('view-vendors')}}" class="btn btn-sm btn-success" style="float:right; color:white;">View Vendor</a> 
    </div> 
    <form action="{{url('vendors-submit')}}" method="post"  enctype="multipart/form-data" onsubmit="return myFun()">
      {{ csrf_field() }}  
         <input type="hidden" name="vendor_id" value="{{$result->id}}">
      <div class="box-body">  
        <?php 
          $b = DB::table('vendor_brands')->where('vendor_id',$result->id)->get(); 
        ?>
        @if($b->count() > 0)
          @foreach($b as $i=>$r1) 
            <?php //echo $r1->brand; ?>
            <div class="cloneRow" id="cloneRow_".{{$i}}>
              <div class="form-group">
                <label>Brand</label>
                <select name="main_category[{{$i}}]" id="brand_{{$i}}" class="form-control"  required>
                 <option value="">select</option>
                 @foreach($test as $r)  
                 <option value="{{$r->id}}" @if( $r1->brand == $r->id)selected @endif>{{$r->brand_name}}</option>
                 @endforeach
               </select>  
              </div> 
              <div class="form-group">
                <label>Assign Priority</label>
                <select class="form-control" id="assign_priority_{{$i}}" name="assign_priority[{{$i}}]" required>
                  <option value="">Select</option>
                  <option value="1" @if($r1->assign_priority == 1)selected @endif>1</option>
                  <option value="2" @if($r1->assign_priority == 2)selected @endif>2</option>
                  <option value="3" @if($r1->assign_priority == 3)selected @endif>3</option>
                  <option value="4" @if($r1->assign_priority == 4)selected @endif>4</option>
                  <option value="5" @if($r1->assign_priority == 5)selected @endif>5</option>
                  <option value="6" @if($r1->assign_priority == 6)selected @endif>6</option>
                  <option value="7" @if($r1->assign_priority == 7)selected @endif>7</option>
                  <option value="8" @if($r1->assign_priority == 8)selected @endif>8</option>
                  <option value="9" @if($r1->assign_priority == 9)selected @endif>9</option>
                  <option value="10"@if($r1->assign_priority == 10)selected @endif>10</option>
                </select>
              </div>  
              <?php if($i>0) {?>
              <input class="btn btn-default btn-danger removeFinCov" id="removeFinCov_{{$i}}" data-limit="10"
              data-clone="cloneRow" data-placement="top" style="width:75px" data-action="remove" value="Remove">
            
              <?php } else { ?>
              <input class="btn btn-default btn-danger removeFinCov" id="removeFinCov_{{$i}}" data-limit="10"
              data-clone="cloneRow" data-placement="top" style="width:75px" data-action="remove" value="Remove">
              <?php } ?>
            </div>
          @endforeach
          <input type="button" id="btnAdd" class="btn btn-sm btn-success addFinCov" style="width:75px"  data-clone="cloneRow" data-action="add" id="cloneRow_0" value="Add">
        @else
            <?php 
              $bvendor = explode(',',$result->brand); 
            ?>
          @foreach($bvendor as $i=>$r3) 
          <div class="cloneRow" id="cloneRow_0">
            <div class="form-group">
              <label>Brand</label>
              <select name="main_category[]" id="brand_0" class="form-control"  required> 
                <option value="">select</option>
                @foreach($test as $r)  
                <option value="{{$r->id}}" @if( $r3 == $r->id)selected @endif>{{$r->brand_name}}</option> 
                @endforeach
              </select>  
            </div>
            <div class="form-group">
              <label>Assign Priority</label>
              <select class="form-control" id="assign_priority_0" name="assign_priority[]" required>
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>  
            <input class="btn btn-default btn-danger removeFinCov" id="removeFinCov_0" data-limit="10"
            data-clone="cloneRow" data-placement="top" style="display: none; width:75px" data-action="remove" value="Remove">
          </div>
          @endforeach
          <input type="button" id="btnAdd" class="btn btn-sm btn-success addFinCov" style="width:75px"  data-clone="cloneRow" data-action="add" id="cloneRow_0" value="Add">
        @endif  
      </div>  
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div> 
</div> 
<script>
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  });
  $(document).ready(function(){
    $('.addFinCov').on('click', function () {
      var obj = $(this).EverClone({
        limit: 10,
        inCrementedId: 'cloneRow',
        removeClass: 'removeFinCov',
        noRemoveClass: 'no_remove_value',
        isRemove: true,
      });
    });
    $('.removeFinCov').on('click', function () {

      var that = $(this).data('clone');
      var obj = $(this).EverClone({
        limit: 10,
        inCrementedId: 'cloneRow',
        addClass: 'addFinCov'
      });

      var cloneClass = $(this).attr('data-clone');
      var lastRepeatingGroup = $('.' + cloneClass).last();
      var len = $('.' + cloneClass).length;
      if (len == 1) {
        $('.removeFinCov').hide();
      }
    });

  });
</script>