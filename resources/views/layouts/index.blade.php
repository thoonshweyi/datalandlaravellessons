@extends("layouts.layout")

@section('title',"Index Page")

@section("heading","My First Index Template")


@section("content")

          <div>
               <h4>This is our company info from Index {{$hay}}</h4>
               <h5>Today is {{$gettoday}}</h5>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>

          <hr/>
@endsection


{{-- @section("footer","Thank for using our platform") --}}

@section("footer")
     Copyright {{$getyear}}. Design by ABC Co,Ltd. {{$demo}} {{$services}}
@endsection