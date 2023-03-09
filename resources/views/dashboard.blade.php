<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
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
    
    <input name="" type="hidden" value="{{ $increment = 1 }}">

<div class="container">
<div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/"><h1>Registration Page</h1></a>
        </div>
    </div>
<table id="datatable" class="table table-bordered table-striped table-dark">
    <thead class="thead-dark">
        <tr>
            <th>Sr.</th>
            <th>Picture</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Country</th>
            <th>About</th>
            <th>Date</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registers as $register)
            <tr>
                <td>{{ $increment }}</td>
                <td>
                <img src="storage/image/{{ $register->image }}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                </td>
                <td>{{ $register->first_name }}</td>
                <td>{{ $register->last_name }}</td>
                <td>{{ $register->gender }}</td>
                <td>
                    @php
                        $hobbies = json_decode($register->hobby)
                    @endphp
                    
                    @foreach($hobbies as $hobby)
                            {{ $hobby }},
                    @endforeach
                </td>
                <td>{{ $register->country }}</td>
                <td>{{ $register->about }}</td>
                <td>{{ date('d-m-Y', strtotime($register->created_at)) }}</td>
                <td><a href="{{ url('/delete/'.$register->id) }}">Delete</a></td>
                <td><a href="{{ url('/editUser/'.$register->id) }}">Update</a></td>
            </tr>

            <input type="hidden" name="" value="{{ $increment += 1 }}">
        @endforeach    
    </tbody>
</table>  
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>