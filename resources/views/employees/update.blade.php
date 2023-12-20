<!DOCTYPE html>
<html>
    <head>
        <title>Employee Page</title>
    </head>
    <body>
        <h1>Welcome to Our Site</h1>
        <p>This is Employee Update</p>


     @php
          echo "<pre>".print_r($employee,true)."</pre>";
     @endphp


     @php
          echo "<pre>".print_r($employee,true)."</pre>";
          echo $employee["name"]."<br/>";
          echo $employee["email"]."<br/>";
          echo $employee["phone"]."<br/>";

     @endphp

    </body>
</html>