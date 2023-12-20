@extends("layouts.app")


@section("title","Create Page")

@section("content")

        <h1>Edit Page</h1>

        <!-- <form action="{{ route('countries.update',$country->id)}}" method="POST"> -->
        <form action="/countries/{{$country->id}}" method="POST">

            @csrf

            <!-- {{ method_field("PUT") }} -->
            @method("PATCH")

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Country Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="{{$country->name}}"/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="capital">Capital</label>
                    <input type="text" name="capital" id="capital" class="form-control form-control-sm rounded-0" value="{{$country->capital}}"/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="currency">Currency</label>
                    <input type="text" name="currency" id="currency" class="form-control form-control-sm rounded-0" value="{{$country->currency}}"/>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="user_id">User ID</label>
                    <input type="number" name="user_id" id="user_id" class="form-control form-control-sm rounded-0" value="{{$country->user_id}}"/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control rounded-0" rows="3">{{$country->content}}</textarea>
                </div>

                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                         <a href="{{route('countries.index')}}" class="btn btn-secondary btn-sm rounded-0 me-3">Cancel</a>
                        <button type="submit" class="btn btn-secondary btn-sm rounded-0">Submit</button>
                    </div>
                </div>
            </div>
        </form>


@endsection