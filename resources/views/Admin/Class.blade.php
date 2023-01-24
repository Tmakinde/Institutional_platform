@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Class
@endsection

@section('content')
   <div class="container mt-5 pt-5" >
    
   <h4 class ="well mb-4 mt-5">CLASSES</h4>
    <form action = "{{route('Add-Class')}}" method = "post">
    @csrf
        <input type = "text" name = "class" placeholder ="Input Class Name here">
        <input type ="Submit" value ="Add">
    </form>
    
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        
        <th scope="col">Class Name</th>
        <th scope="col">Assign To Subjects</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    
    <tbody>
    @foreach ($classes as $class)
        <tr>
        
          <td id = "usernameColumn"><h3 class = "text-success"><a href = "{{route('Student-Section', ['id' => $class->id])}}">{{$class->class}}</a></h3></td>  
          <td><h3 class = "text-success"><a href = "{{route('Subject-Section', ['id' => $class->id])}}" type = "button" class="btn btn-primary">Assign Subjects</a></h3></td>     
          <td>
            <form method = 'post' action = "{{route('Delete-Class', ['id' => $class->id])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td> 

        </tr>
    @endforeach
    </tbody>
    </table>
  </div>
@endsection
@section('scripts')
@parent
@endsection
    
  