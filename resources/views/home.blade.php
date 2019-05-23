@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Add Buildings
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
 Add Rooms
</button></div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Buildings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{URL::to('/')}}/addbuilding" method="POST" id="form1">
            @csrf
      <div class="modal-body">
       <label>
           Select Owner
           <select class="form-control" name="owner">
               <option value="">---select Owner---</option>
               @foreach($users as $user)
               <option value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
           </select>
       </label>
       <label>
           Eneter Building Name
           <input type="text" name="buildname" class="form-control">
       </label>
       <button type="submit" class="btn btn-warning btn-lg" onclick="document.getElementById('form1').sumit()" >submit</button>
      </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Rooms</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{URL::to('/')}}/addroom" method="POST" id="form11">
            @csrf
      <div class="modal-body">
       <label>
           Select Owner
           <select class="form-control" name="owner">
               <option value="">---select Owner---</option>
               @foreach($users as $user)
               <option value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
           </select>
       </label>
       <label>
           Select Building
           <select class="form-control" name="buildname">
               <option value="">---select Owner---</option>
               @foreach($building as $build)
               <option value="{{$build->id}}">{{$build->buildingname}}</option>
               @endforeach
           </select>
       </label>
       <label>
           Eneter room Name
           <input type="text" name="roomname" class="form-control">
       </label>
       <button type="submit" class="btn btn-warning btn-lg" onclick="document.getElementById('form11').sumit()" >submit</button>
      </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



                <div class="card-body">
                   <table class="table" border="1">
                       <thead>
                           <th>Room Name</th>
                           <th>Building Name</th>
                           <th>Owner Name</th>

                       </thead>
                       <tbody>
                        @foreach($rooms as $room)
                           <tr>
                             <td>{{$room->rooname}}</td>
                             <td>{{$room->building->buildingname ?? ' '}}</td>
                             <td>{{$room->owner->name ?? ' '}}</td>
                             
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
