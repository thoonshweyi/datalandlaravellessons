<!DOCTYPE html>
<html>
    <head>
        <title>Student Page</title>
    </head>
    <body>
        <h1>Welcome to Our Site</h1>
        <p>This is Student Page</p>
        <ul>
            <li><a href="{{URL::to('/students')}}">Index</a></li>
            <li><a href="{{URL::to('/students/show')}}">Show</a></li>
            <li><a href="{{URL::to('/students/edit')}}">Edit</a></li>
        </ul>
    </body>
</html>