<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
    <!-- <div class="row">
        <div class="col-md-6"> -->
            <h1>Edit Page</h1>
        <!-- </div>
        <div class="col-md-6 text-right">
            <a href="dashboard"><h1>Dashboard Page</h1></a>
        </div>
    </div> -->
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('warning'))
        <div class="alert alert-danger">
            {{Session::get('status')}}
        </div>
    @elseif (Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>	
    @endif
<span id="output"></span>
<div class="form-errors"></div>
    <!-- action="saveUser" method="post" enctype="multipart/form-data" -->
<form action="/updateUser" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="id" placeholder="ID" value="{{ $register->id }}">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" name = "first_name" value="{{ $register->first_name }}" placeholder="First name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" name = "last_name" value="{{ $register->last_name }}" placeholder="Last name" required>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" {{ $register->gender == 'Male' ? 'checked' : ''}}>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" {{ $register->gender == 'Female' ? 'checked' : ''}}>
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        <!-- <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div> -->
      </div>
    </div>
  </fieldset>

  @php 
        $hobbies = json_decode($register->hobby)
  @endphp

  <div class="form-group row">
    <div class="col-sm-2">Hobby</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" name = "hobby[]" value="hobby" {{ in_array('hobby', $hobbies) ? 'checked':'' }} type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
            Hobby
        </label>
        <input style="margin-left: 5px" class="form-check-input" name = "hobby[]" value="Sports" {{ in_array('Sports', $hobbies) ? 'checked':'' }} type="checkbox" id="gridCheck1">
        <label style="margin-left: 25px" class="form-check-label" for="gridCheck1">
            Sports
        </label>
        <input style="margin-left: 5px" class="form-check-input" name = "hobby[]" value="Seasons" {{ in_array('Seasons', $hobbies) ? 'checked':'' }} type="checkbox" id="gridCheck1">
        <label style="margin-left: 25px" class="form-check-label" for="gridCheck1">
            Seasons
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
    <select class="form-control" name="country" id="exampleFormControlSelect1" required>
      <option value"Pakistan" {{ $register->country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
      <option value"USA" {{ $register->country == 'USA' ? 'selected' : '' }}>USA</option>
      <option value"United_Kingdom" {{ $register->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
      <option value"Russia" {{ $register->country == 'Russia' ? 'selected' : '' }}>Russia</option>
      <option value"China" {{ $register->country == 'China' ? 'selected' : '' }}>China</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About</label>
    <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3" required>{{ $register->about }}</textarea>
  </div>
  <!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Confirm Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Confirm Email" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Confirm Password" required>
    </div>
  </div>
   -->
 
   
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" id="image" class="form-control-file" value="{{ $register->image }}" name="image" id="exampleFormControlFile1" onChange="previewImage(event)">
    <img src="/storage/image/{{ $register->image }}" style="height : 50px; width : 50px" id="image-preview" class="img-circle elevation-2" alt="User Image">
  </div>
  <!-- <div class="form-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="image" id="validatedCustomFile">
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    <img src="/storage/image/{{ $register->image }}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>
  </div> -->
  <button style="margin-top: 30px; padding: 10px 20px 10px 20px" type="submit" class="btn btn-primary" id = "btnSubmit">Update</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>