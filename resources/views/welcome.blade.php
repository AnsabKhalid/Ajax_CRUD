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
    <div class="row">
        <div class="col-md-6">
            <h1>Registration Page</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="dashboard"><h1>Dashboard Page</h1></a>
        </div>
    </div>
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
<span style="color: red" id="output"></span>
    <!-- action="saveUser" method="post" enctype="multipart/form-data" -->
<form id = "my-form">
{{ csrf_field() }}
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" name = "first_name" placeholder="First name" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" name = "last_name" placeholder="Last name" >
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male">
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
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
  <div class="form-group row">
    <div class="col-sm-2">Hobby</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" name = "hobby[]" value="hobby" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
            Hobby
        </label>
        <input style="margin-left: 5px" class="form-check-input" name = "hobby[]" value="Sports" type="checkbox" id="gridCheck1">
        <label style="margin-left: 25px" class="form-check-label" for="gridCheck1">
            Sports
        </label>
        <input style="margin-left: 5px" class="form-check-input" name = "hobby[]" value="Seasons" type="checkbox" id="gridCheck1">
        <label style="margin-left: 25px" class="form-check-label" for="gridCheck1">
            Seasons
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
    <select class="form-control" name="country" id="exampleFormControlSelect1" >
      <option value"Pakistan">Pakistan</option>
      <option value"USA">USA</option>
      <option value"United_Kingdom">United Kingdom</option>
      <option value"Russia">Russia</option>
      <option value"China">China</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About</label>
    <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3" ></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Confirm Email</label>
      <input type="email" class="form-control" name="confirm_email" id="inputEmail4" placeholder="Confirm Email" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="confirm_password" id="inputPassword4" placeholder="Confirm Password" >
    </div>
  </div>
  
 
   
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
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" >
  </div>
  <button type="submit" class="btn btn-primary" id = "btnSubmit">Sign in</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#my-form").submit(function(event) {
            event.preventDefault();

            var form = $("#my-form")[0];
            var data = new FormData(form);
            
            $("#btnSubmit").prop("disabled",true);

            $.ajax({
                type:"POST",
                url: "{{ route('saveUser') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert(data.res);
                    // $("#output").text(data.res);
                    $("#btnSubmit").prop("disabled",false);
                    $(document).ajaxStop(function(){
                    window.location.reload();
                });
                },
                error: function(e) {
                    $("#output").text(e.responseText);
                    // console.log(e.responseText);
                    // var formErrors = e.responseJSON.errors;
                    $("#btnSubmit").prop("disabled",false);

                //     var str = '<div class="text-danger>';
                //         str += '<ul>';
                //     if(formErrors.hasOwnProperty('email')) {
                //         str += '<li>' + formErrors.input_email[0] + '</li>';
                //     }
                //     str += '</ul></div>';

                //     $('#form-errors').html(str);
                }
            });
        });
    });
</script>
</body>
</html>