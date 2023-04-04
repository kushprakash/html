<div class="col-md-12"> 
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Vendors Details</h3> 
    </div> 
    <form action="{{url('edit-became-vendor-submit')}}" method="post"  enctype="multipart/form-data" onsubmit="return myFun()">
      {{ csrf_field() }}  
      <input type="hidden" class="form-control"   value="{{$result->id}}" required name="id">
      <div class="box-body"> 
        <div class="form-group col-md-6">
          <label> Legal Entity Name</label>
          <input type="text" class="form-control" id="" value="{{$result->legal_entry_name}}" required name="legal_entry_name">
        </div>
        <div class="form-group col-md-6">
          <label>Registered Address</label>
          <input type="text" class="form-control" id="" value="{{$result->register_address}}" required name="register_address">
        </div>
        <div class="form-group col-md-6">
          <label>Shipping Address</label>
          <input type="text" class="form-control" id="" value="{{$result->shiping_address}}" required name="shiping_address">
        </div>
        <div class="form-group col-md-6">
          <label>Email ID of Authorized Signatory</label>
          <input type="email" class="form-control" id="" value="{{$result->email_id}}" required name="email_id">
        </div>
        <div class="form-group col-md-6">
          <label>Name of Authorized Signatory</label>
          <input type="text" class="form-control" id="" value="{{$result->authorized_name}}" required name="authorized_name">
        </div>
        <div class="form-group col-md-6">
          <label>Designation of Authorized Signatory</label>
          <input type="text" class="form-control" id="" value="{{$result->authorized_designation}}" required name="authorized_designation">
        </div>
        <div class="form-group col-md-6">
          <label>Contact Number of Authorized Signatory</label>
          <input type="number" class="form-control" id="" value="{{$result->authorized_contact_no}}" required name="authorized_contact_no">
          <span id="message" style="color: red;"></span> 
        </div>
        <div class="form-group col-md-6">
          <label>Drug License Number (Mention 'NA' if not applicable)</label>
          <input type="text" class="form-control" id="" value="{{$result->drug_license_number}}" required name="drug_license_number">
        </div>
        <div class="form-group col-md-6">
          <label>FSSAI License Number (Mention 'NA' if not applicable)</label>
          <input type="text" class="form-control" id="" value="{{$result->fssai_license_number}}" required name="fssai_license_number">
        </div>
        <div class="form-group col-md-6">
          <label>Expiry date of Drug License Number</label>
          <input type="date" class="form-control" id="" value="{{$result->expiry_drug_license_number}}"   name="expiry_drug_license_number">
        </div>
        <div class="form-group col-md-6">
          <label>4. Expiry date of FSSAI License Number</label>
          <input type="date" class="form-control" id="" value="{{$result->expiry_fssai_license_number}}"   name="expiry_fssai_license_number">
        </div>
        <div class="form-group col-md-6">
          <label>Name of Signatory as mentioned on Cheque attached Name of Bank (Public/Private) as mentioned on Cheque attached</label><br>
          <img style="height: 150px; width: 130px;"  src="{{asset($result->signature_on_cheque)}}"><br>
          <input type="hidden" name="signature_on_cheque" value="{{$result->signature_on_cheque}}"><br>
          <input type="file" class="form-control" name="signature_on_cheque"> 
          <!-- <input type="file" class="form-control" id="" value="{{$result->signature_on_cheque}}" required name="signature_on_cheque"> -->
        </div>
        <div class="form-group col-md-6">
          <label>PAN Card Number</label>
          <input type="text" class="form-control" id="" value="{{$result->pan_no}}" required name="pan_no">
        </div>
        <div class="form-group col-md-6">
          <label>PAN Card Image</label><br>
          <img style="height: 150px; width: 130px;"  src="{{asset($result->pan_image)}}"><br>
          <input type="hidden" name="pan_image" value="{{$result->pan_image}}"><br>
          <input type="file" class="form-control" name="pan_image"> 
          <!-- <input type="file" class="form-control" id="" value="{{$result->pan_image}}" required name="pan_image"> -->
        </div>
        <div class="form-group col-md-6">
          <label>AADHAR Card Number Authorized Signatory</label>
          <input type="number" class="form-control" id="" value="{{$result->aadhar_no}}" required name="aadhar_no">
        </div>
        <div class="form-group col-md-6">
          <label>AADHAR Card Authorized Signatory Image</label><br>
          <img style="height: 150px; width: 130px;"  src="{{asset($result->aadhar_image)}}"><br>
          <input type="hidden" name="aadhar_image" value="{{$result->aadhar_image}}"><br>
          <input type="file" class="form-control" name="aadhar_image"> 
          <!-- <input type="file" class="form-control" id="" value="{{$result->aadhar_image}}" required name="aadhar_image"> -->
        </div>
        <div class="form-group col-md-6">
          <label>Bank Account Number as mentioned on Cheque attached</label><br>
          <img style="height: 150px; width: 130px;"  src="{{asset($result->account_no)}}"><br>
          <input type="hidden" name="account_no" value="{{$result->account_no}}"><br>
          <input type="file" class="form-control" name="account_no"> 
          <!-- <input type="file" class="form-control" id="" value="{{$result->account_no}}" required name="account_no"> -->
        </div>
        <div class="form-group col-md-6">
          <label>GSTIN Number</label>
          <input type="text" class="form-control" id="" value="{{$result->gst_no}}" required name="gst_no">
        </div> 
        <div class="form-group col-md-6">
          <label>IFSC Code as mentioned on Cheque attached</label><br>
          <img style="height: 150px; width: 130px;"  src="{{asset($result->ifsc_code)}}"><br>
          <input type="hidden" name="ifsc_code" value="{{$result->ifsc_code}}"><br>
          <input type="file" class="form-control" name="ifsc_code"> 
          <!-- <input type="file" class="form-control" id="" value="{{$result->ifsc_code}}" required name="ifsc_code"> -->
        </div>
        <div class="form-group checkbox col-md-12">
          <input type="checkbox" id="" value="{{$result->order_time}}" required name="order_time" value="1"> 1. It is expected that the vendor should be able to process all the orders that he received before 4 PM same day and rest of the orders next day.<br>
          <input type="checkbox" id="" value="{{$result->contact_person_touch}}" required name="contact_person_touch" value="1"> 2. Regarding processing, there should be Contact Person from the vendor that will stay in touch with our operation team for smooth operation.<br>
          <input type="checkbox" id="" value="{{$result->business_hour}}" required name="business_hour" value="1"> 3. The vendor is expected to share their business hours which should atleast be from 10 AM to 6 PM. <br>
          <input type="checkbox" id="" value="{{$result->packaging_cost}}" required name="packaging_cost" value="1"> 4. The vendor will bear the packaging cost for the orders. firstmed tapes (charges) will be shared. 1week prior notice is required for replenishment.<br>
          <input type="checkbox" id="" value="{{$result->penalty}}" required name="penalty" value="1"> 5. There will be a penalty of Rs 1000 in the case of expired product is dispatched to the customer. For wrong orders, the vendor shall bear the cost of reverse and re-logistics.<br>
          <input type="checkbox" id="" value="{{$result->change_invntory_pack}}" required name="change_invntory_pack" value="1"> 6. For any change in the inventory/price/pack size, they need to intimate firstmed02@gmail.com proactively. <br>
          <input type="checkbox" id="" value="{{$result->computer_bill}}" required name="computer_bill" value="1"> 7. All billing shall be computer generated and be complying to all GST norms, directly to the consumer.<br>
          <input type="checkbox" id="" value="{{$result->standard_packaging}}" required name="standard_packaging" value="1"> 8. Standard packaging norms should apply. No competition logo/mention should be on the packaging material. 
          <!-- <h3>Read Terms & Conditions</h3>
          <input type="checkbox" id="" value="{{$result->agree }}" required name="agree" value="1"> I Agree  <br> -->

        </div>
        
      </div> 
      <button type="submit" class="btn btn-primary">Submit</button><br>
    </form> 
  </div> 
</div>
