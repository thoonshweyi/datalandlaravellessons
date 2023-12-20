@extends("layouts.layout")

@section("title","Member Page")

@section("heading")

     <!-- My First Member Template -->
     {{$header}}
@endsection

@section("content")

          <div>
               <h4>This is our company info from Member</h4>
               <h5>Today is {{$gettoday}}</h5>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>

          <hr/>

          @php
               echo count($students)
          @endphp
          <hr/>

          @if(count($students))
               <ul>
                    @foreach($students as $student)
                         <li>{{$student}}</li>
                    @endforeach
               </ul>
          @endif
          <hr/>


@stop

     

@section("footer")
     Copyright {{$getyear}} .Thank for using our platform.{{$hay}}. {{$services}} {{$demo}}
@endsection