@extends("layouts.app")

@section("title","Index Page")

@section("content")

     <h1>Index Page</h1>

     <div class="col-md-12 mb-3">
          <a href="{{route('products.create')}}" class="btn btn-primary btn-sm rounded-0">Create New Product</a>
     </div>
     <table id="mytable" class="table table-sm table-hover border">

          <thead>
               <th>No</th>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Created At</th>
               <th>Updated At</th>
               <th>Action</th>
          </thead>

          <tbody>
               @foreach($products as $idx=>$product)
               <tr>
                    <td>{{++$idx}}</td>
                    {{-- <td>{{$product->image}}</td> --}}
                    <td>
                         <!-- Image view -->
                         <!-- =>public -->
                              
                              <img src="{{ asset($product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  
                              <img src="{{ asset('images/'.$product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />

                              <img src="{{ url($product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  
                              <img src="{{ url('images/'.$product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  

                              <img src="{{ URL::asset($product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  
                              <img src="{{ URL::asset('images/'.$product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  

                              <!-- 
                                   call image under public > images
                                   -image store with path (images\1701952618user1.jpg)
                                        directly give image column as parameter
                                        asset($product->image) 
                                   -image store without path (1701952438user1.jpg)
                                        *prefer method
                                        concat the image column with path as parameter
                                        asset('images/'.$product->image)
                                   
                                   http://127.0.0.1:8000/images/1701952618user1.jpg
                                   
                                   *error image (double paths)
                                   http://127.0.0.1:8000/images/images\1701952618user1.jpg
                                   *error image (no path)
                                   http://127.0.0.1:8000/1701952438user1.jpg
                                   
                               -->
                         <!-- =>storage -->
                         
                              <img src="{{ asset('storage/'.$product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  
                              <img src="{{ asset('storage/images/'.$product->image) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="{{$product->image}}" />  
                              <!-- call image under public > storage > images -->

                              <!-- http://127.0.0.1:8000/storage/images/1702027420.jpg -->
                              
                              <!-- *error image (no path) -->
                              <!-- http://127.0.0.1:8000/storage/1702027420.jpg -->
                              
                         </td>
                    <td>
                         <a href="{{route('products.show',$product->id)}}">{{$product->name}}</a>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                         <a href="{{route('products.edit',$product->id)}}" class="text-info me-3"><i class="fas fa-pen"></i></a>
                         <a href="#" class="text-danger" onclick="event.preventDefault();document.getElementById('formdelete-{{$product->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                         <form id="formdelete-{{$product->id}}" action="{{ route('products.destroy',$product->id) }}" method="post">
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