<!DOCTYPE html>
<html>
    <head>
        <title>Employee Page</title>
    </head>
    <body>
        <h1>Welcome to Our Site</h1>
        <p>This is Employee Edit</p>


        @php
               echo "<pre>".print_r($data["employeedata"],true)."</pre>";
               echo $data["employeedata"]["name"]."<br/>";
               echo $data["employeedata"]["email"]."<br/>";
               echo $data["employeedata"]["phone"]."<br/>";

        @endphp

    </body>
</html>