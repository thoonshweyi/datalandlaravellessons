@extends("layouts.app")

@section("title","Index Page")

@section("content")

     <h1>Index Page</h1>

     <div class="col-md-12 mb-3">
          <a href="{{route('countries.create')}}" class="btn btn-primary btn-sm rounded-0">Create New Country</a>
     </div>
     <table id="mytable" class="table table-sm table-hover border">

          <thead>
               <th>No</th>
               <th>Name</th>
               <th>Capital</th>
               <th>Currency</th>
               <th>User_id</th>
               <th>Created At</th>
               <th>Updated At</th>
               <th>Action</th>
               <th>Drop</th>
          </thead>

          <tbody>
               @foreach($countries as $idx=>$country)
               <tr>
                    <td>{{++$idx}}</td>
                    <td>
                         <a href="{{route('countries.show',$country->id)}}">{{$country->name}}</a>
                    </td>
                    <td>{{$country->capital}}</td>
                    <td>{{$country->currency}}</td>
                    <td>{{$country->user_id}}</td>
                    <td>{{$country->created_at}}</td>
                    <td>{{$country->updated_at}}</td>
                    <td>
                         <a href="{{route('countries.edit',$country->id)}}" class="text-info me-3"><i class="fas fa-pen"></i></a>
                         {{-- <a href="{{route('countries.delete',$country->id)}}" class="text-danger"><i class="fas fa-trash-alt"></i></a> --}}
                         
                         {{-- {{ route('countries.destroy',$country->id) }} --}}
                         {{-- {{ route('countries.destroy',$country['id']) }} --}}
                         {{-- /countries/{{$country->id}} --}}
                         {{-- countries/{{$country['id']}} --}}
                         {{-- {{url('/countries',$country->id)}} --}}
                         {{-- {{url('countries',$country['id'])}} --}}
                         
                         <form class="formdelete" action="{{url('countries',$country['id'])}}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash-alt"></i></button>

                         </form>
                    </td>
                    <td>
                         <a href="{{route('countries.edit',$country->id)}}" class="text-info me-3"><i class="fas fa-pen"></i></a>
                         <a href="#" class="text-danger" onclick="event.preventDefault();document.getElementById('formdelete-{{$country->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                         <form id="formdelete-{{$country->id}}" action="{{ route('countries.destroy',$country->id) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                         </form>
               </tr>
               @endforeach
          </tbody>

     </table>

@endsection

@section("script")
     <script type="text/javascript">
          $(document).ready(function(){
               $(".formdelete").on("submit",function(){
                    if(confirm("Are you sure you want to delete if?")){
                         return true;
                    }else{
                         return false;
                    }
               });
          });
     </script>
@endsection