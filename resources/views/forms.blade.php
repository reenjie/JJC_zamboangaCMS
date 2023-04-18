<div class="col-md-4">
  <label for="first-name" class="form-label">First Name <span class="text-danger">@isset($pledge_exempted) @else * @endisset</span></label>
  <input type="text" @isset($pledge_exempted) @else required @endisset name="fname" class="form-control ekis" placeholder="First Name" id="first-name">
</div>
<div class="col-md-4">
  <label for="last-name" class="form-label">Last Name <span class="text-danger">@isset($pledge_exempted) @else * @endisset</span></label>
  <input type="text"  @isset($pledge_exempted) @else required @endisset name="lname" class="form-control ekis" placeholder="Last Name" id="last-name">
</div>
<div class="col-md-4">
  <label for="middle-name" class="form-label">Middle Name </label>
  <input type="text" name="mname" class="form-control " placeholder="Middle Name" id="middle-name">
</div>
<div class="col-md-2">
  <label for="date-of-birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
  
  <input type="date" name="dob" required class="form-control ekis" 
  id="date-of-birth" 
  max="{{date('Y-m-d', strtotime('-'.$cdata['startage'].' years'))}}" 
  min="{{date('Y-m-d', strtotime('-'.$cdata['endage'].' years'))}}">
  
</div>
<div class="col-md-2">
  <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
  <select id="gender" required name="gender" class="form-select ekis">
    <option selected>Choose...</option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
@isset($pledge_exempted) @else @isset($volunteer_exempted) @else <div class="col-md-2">
  <label for="marital-status" class="form-label">Marital Status <span class="text-danger">*</span></label>
  <select id="marital-status" required name="status" class="form-select ekis">
    <option selected>Choose...</option>
    <option>Single</option>
    <option>Married</option>
  </select>
</div> @endisset @endisset

<div class="col-md-2">
  <label for="religion" class="form-label">Religion <span class="text-danger">*</span></label>
  <select id="religion" required name="religion" class="form-select ekis">
    <option selected>Choose...</option>
    <option>Roman Catholic</option>
    <option>...</option>
  </select>
</div>
<div class="col-md-2">
  <label for="age" class="form-label">Age</label>
  <input type="text" class="form-control" id="age" disabled>
</div>

@isset($pledge_exempted) @else
<div class="col-md-4">
  <label for="place-of-birth" class="form-label">Place of Birth <span class="text-danger">*</span></label>
  <input type="text" name="pob" required class="form-control ekis" placeholder="Place of Birth" id="place-of-birth">
</div>
@endif
<label class="form-label">Permanent Address</label>
<div class="col-md-3">
  <label for="street" class="form-label">Prk/Street/Building No. <span class="text-danger">*</span></label>
  <input type="text" required name="ad1" class="form-control ekis" placeholder="Prk/Street/Building No." id="street">
</div>
<div class="col-md-3">
  <label for="barangay" class="form-label">Barangay <span class="text-danger">*</span></label>
  <input type="text" required name="ad2" class="form-control ekis" placeholder="Barangay" id="barangay">
</div>
<div class="col-md-3">
  <label for="city" class="form-label">City <span class="text-danger">*</span></label>
  <input type="text" required name="ad3" class="form-control ekis" placeholder="City" id="city">
</div>
<div class="col-md-3">
  <label for="region" class="form-label">Region <span class="text-danger">*</span></label>
  <input type="text" required name="ad4" class="form-control ekis" placeholder="Region" id="region">
</div>

<div class="col-md-3">
  <label for="contact-number" class="form-label">Contact Number <span class="text-danger">*</span></label>
  <input type="text" name="contact" required class="form-control ekis" placeholder="Contact Number" id="contact-number">
</div>

<div class="col-md-6">
  <label for="contact-address" class="form-label">Contact Address</label>
  <input type="text" name="contactadd" class="form-control" placeholder="Contact Address" id="contact-address">
</div>
<label class="form-label">Social Media (optional)</label>
<div class="col-md-3">
  <label for="fb-name" class="form-label">Facebook Name</label>
  <input type="text" name="facebook" class="form-control" placeholder="Facebook Name" id="fb-name">
</div>
<div class="col-md-3">
  <label for="twitter-name" class="form-label">Twitter Name</label>
  <input type="text" name="twitter" class="form-control" placeholder="Twitter Name" id="twitter-name">
</div>
<div class="col-md-3">
  <label for="instagram-name" class="form-label">Instagram Name</label>
  <input type="text" name="instagram" class="form-control" placeholder="Instagram Name" id="instagram-name">
</div>
<div class="col-md-3">
  <label for="linkedin-name" class="form-label">Linkedin Name</label>
  <input type="text" name="linkedin" class="form-control" placeholder="Linked Name" id="linkedin-name">
</div>