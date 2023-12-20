<?php

use Illuminate\Support\Facades\Route;
    use \App\Http\Controllers\CountriesController;
    use \App\Http\Controllers\employeesController;
    use \App\Http\Controllers\studentsController;
    use \App\Http\Controllers\staffsController;
    use \App\Http\Controllers\dashboardsController;
    use \App\Http\Controllers\membersController;
    use \App\Http\Controllers\ProductController;

    
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;

    use App\Models\Article;
    use App\Models\Gender;
    use App\Models\Item;
    use App\Models\Phone;
    use App\Models\Photo;
    use App\Models\Role;
    use App\Models\Tag;
    use App\Models\User;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",function(){
    return "Save Myanmar";
});

Route::get("/sayar",function(){
    return "Hay,Sayar Nay Kaung Lar ??";
});

Route::get("sayhi",function(){
    return "Hi Min Ga Lar Par";
});

// Route::get("about",function(){
//     return view("aboutme");
// });

Route::view("about","aboutme");

Route::get("/about/company",function(){
    return view("aboutcompany");
});

// Route::view("about/company","aboutme");

// Route::get('contact',function(){
//     return redirect("about");
// });

Route::redirect("contact","about/company");

Route::get("about/company/{staff}",function($staff){
    return view("aboutcompanystaff",["sf"=>$staff]);
});

Route::get("about/company/{staff}/{city}",function($staff,$city){
    return view("aboutcompanystaffbycity",['sf'=>$staff,"ct"=>$city]);
});

Route::get("profile",function(){
    return view("profileme");
})->name('profiles');



// Route::get("/students",[\App\Http\Controllers\studentsController::class,'index'])->name("students.index");
// Route::get("/students/show",[\App\Http\Controllers\studentsController::class,'show'])->name("students.show");
// Route::get("/students/edit",[\App\Http\Controllers\studentsController::class,'edit'])->name("students.edit");

// Route::group(['prefix'=>"students"],function(){
//     Route::get("/",[\App\Http\Controllers\studentsController::class,'index'])->name("students.index");
//     Route::get("/show",[\App\Http\Controllers\studentsController::class,'show'])->name("students.show");
//     Route::get("/edit",[\App\Http\Controllers\studentsController::class,'edit'])->name("students.edit");
// });

// Route::name("students.")->group(function(){
//     Route::get("/students",[\App\Http\Controllers\studentsController::class,'index'])->name("index");
//     Route::get("/students/show",[\App\Http\Controllers\studentsController::class,'show'])->name("show");
//     Route::get("/students/edit",[\App\Http\Controllers\studentsController::class,'edit'])->name("edit");
// });


// Route::name("students.")->group(function(){
//     Route::get("/students",[studentsController::class,'index'])->name("index");
//     Route::get("/students/show",[studentsController::class,'show'])->name("show");
//     Route::get("/students/edit",[studentsController::class,'edit'])->name("edit");
// });

Route::get("/staffs",[staffsController::class,'home'])->name("staffs.home");
Route::get("/staffsparty",[staffsController::class,'party'])->name("staffs.party");
Route::get("/staffsparty/{total}",[staffsController::class,'partytotal'])->name("staffs.total");
Route::get("/staffsparty/{total}/{status}",[staffsController::class,'partytotalconfirm'])->name('staffs.status');


Route::get("employees",[employeesController::class,'index'])->name("employees.index");
// Route::get("/employees/show",[employeesController::class,'index'])->name("employees.show");
Route::get("/employees/show",[employeesController::class,'show'])->name("employees.show");
Route::get("/employees/passingdataone",[employeesController::class,'passingdataone'])->name("employees.passingdataone");
Route::get("/employees/passingdatatwo",[employeesController::class,'passingdatatwo'])->name("employees.passingdatatwo");
Route::get("/employees/passingdatathree",[employeesController::class,'passingdatathree'])->name("employees.passingdatathree");
Route::get("/employees/passingdatafour",[employeesController::class,'passingdatafour'])->name("employees.passingdatagour");
Route::get("/employees/edit",[employeesController::class,'edit'])->name("employees.edit");
Route::get("/employees/update",[employeesController::class,'update'])->name("employees.update");

Route::get("/dashboards",[dashboardsController::class,"index"])->name("dashboards.index");
Route::get("/members",[membersController::class,"index"])->name("members.index");


// =>Data Insert From Route

// use Illuminate\Support\Facades\DB;
Route::get("/types/insert",function(){
    
    DB::insert("INSERT INTO types(name) VALUE(?)",["book"]);
    DB::insert("INSERT INTO types(name) VALUE(?)",["cd"]);
    DB::insert("INSERT INTO types(name) VALUE(?)",["pdf"]);
    return "Successfully Inserted";
});

// Route::get("/types/read",function(){
//     $results = DB::select("SELECT * FROM types");
//     return $results;
// });

// Route::get("/types/read",function(){
//     $results = DB::select("SELECT * FROM types");
//     return var_dump($results);
// });

// Route::get("/types/read",function(){
    // $results = DB::select("SELECT * FROM types);
    // foreach($results as $type){
    //     echo $type->name. "<br/>";
    // }
// });
    
// Route::get("/types/read",function(){

//     $results = DB::select("SELECT * FROM types WHERE id=?",[1]);
//     return $results;
// });

Route::get("students/insert",function(){
    DB::insert("INSERT INTO students(name,phonenumber,address) VALUE(?,?,?)",['aung aung','11111','yangon']);
    return "Data Inserted";
});

Route::get("types/update",function(){
    // DB::update("UPDATE types SET name='ebook' WHERE id=?",[4]);
    // DB::update("UPDATE types SET name='pdf' WHERE id=?",[4]);
    
    
    return "Data Updated";
});

Route::get("shoppers/update",function(){

    DB::update("UPDATE shoppers SET fullname=?,phonenumber=?,city=? WHERE id=?",['kyaw kyaw','22222','mandalay',2]);

    return "Data Updated";
});

Route::get("shoppers/delete",function(){

    DB::delete('DELETE FROM shoppers WHERE id=?',[2]);
    return "Data Deleted";
});

Route::get("shoppers/read",function(){

    // $result = DB::select("SELECT * FROM shoppers");
    // return $result;

    // $result = DB::select("SELECT * FROM shoppers WHERE id=?",[6]);
    // return $result;

    // $result = DB::table("shoppers")->get();
    // return $result;

    // =>select(columns)
    // =>selectRaw(expression)

    // $result = DB::table("shoppers")->select("*")->get();
    // $result = DB::table("shoppers")->selectRaw("*")->get();

    // =>DB::raw(value)
    // $result = DB::table("shoppers")->select(DB::raw("*"))->get();
    // $result = DB::table("shoppers")->selectRaw(DB::raw("*"))->get();

    // $result = DB::table("shoppers")->select("*")->where('id',5)->get();
    // $result = DB::table("shoppers")->select("*")->where('id',"5")->get();

    // $result = DB::table("shoppers")->select("fullname")->where('id',5)->get();
    // $result = DB::table("shoppers")->select("fullname","phonenumber")->where('id',5)->get();
    // $result = DB::table("shoppers")->select("fullname","phonenumber","city")->where('id',5)->get();
    // $result = DB::table("shoppers")->select("fullname","phonenumber","city")->where('id',"<>",5)->get();

    // $result = DB::table("shoppers")->select(DB::raw("*"))->where('id',5)->get();
    // $result = DB::table("shoppers")->select(DB::raw("fullname"))->where('id',5)->get();
    // $result = DB::table("shoppers")->select(DB::raw("fullname,phonenumber"))->where('id',5)->get();
    // $result = DB::table("shoppers")->select(DB::raw("fullname,phonenumber,city"))->where('id',5)->get();


    // $result = DB::table("shoppers")->selectRaw("*")->where('id',5)->get();

    // $result = DB::table("shoppers")->selectRaw("fullname")->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw("fullname,phonenumber")->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw("fullname,phonenumber,city")->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw("fullname,phonenumber,city")->where('id',"<>",5)->get();

    // $result = DB::table("shoppers")->selectRaw(DB::raw('*'))->where('id',5)->get();

    // $result = DB::table("shoppers")->selectRaw(DB::raw('fullname'))->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw(DB::raw('fullname,phonenumber'))->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id',5)->get();
    // $result = DB::table("shoppers")->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id',"<>",5)->get();

    // $result = DB::table("shoppers")->select('count(*) AS totalshopper,city')->where('id',"<>",5)->groupBy("city")->get();
    // oki
    // $result = DB::table("shoppers")->select(DB::raw("count(*) AS totalshopper,city"))->where('id',"<>",5)->groupBy("city")->get();

    // $result = DB::table("shoppers")->selectRaw("count(*) AS totalshopper,city")->where('id',"<>",5)->groupBy("city")->get();
    // $result = DB::table("shoppers")->selectRaw(DB::raw("count(*) AS totalshopper,city"))->where('id',"<>",5)->groupBy("city")->get();

    // return $result;

    // $result = DB::table("shoppers")->first();
    // return $result;

    // =>pluck(value,key)
    // error
    // $result = DB::table('shoppers')->pluck();

    // $result = DB::table('shoppers')->pluck("fullname"); //array
    $result = DB::table('shoppers')->pluck("fullname",'id'); //object
    return $result;

    // 16PK
});

// => Database Eloquent ORM
// sro
    // use App\Models\Article;
Route::get("article/read",function(){
    // $articles = Article::all();
    // return $articles;
    // *display in dark mode

    // $articles = Article::all();
    // return "$articles";
    // *display in white mode

    $articles = Article::all();
    // var_dump($articles);

    foreach($articles as $article){
        echo "$article->title <br/> $article->description <br/> <hr/>";
    }
});



Route::get("articles/find",function(){
    // => find() return very first row
    //      * retrieve only one row of matching result
    //      *find(parm) the find column value is connnected to Articles> $primaryKey
    //      *get no error if not match

    
    // $article = Article::find(1);
    // return $article;
    // = Article.php
    //      protected $primaryKey = "id";
    // *find() will find with the "id" column name

    // $article = Article::find(2);
    // return $article;
    // = Article.php
    //      protected $primaryKey = "user_id";
    // *find() will find with the "user_id" column name

    // $article = Article::find(50);
    // return $article;
    

    // =Not Found Exception
    // * 404 Not Found Exception will get.
    
    // $articles = Article::findOrFail(50);
    // return $articles;

    // $article = Article::findOrFail(1);
    // echo "$article->title <br/> $article->description <br/> <hr/>";

    // $articles = Article::find(50);
    // echo "$article-> title <br/> $article->description <br/> <hr/>";
    // *find() method will get error
    // *findOrFail() is better than find() because it will fail if not match and no error

    // findOr("id",callback)
    // $article = Article::findOr("5",function(){
    //     return "Hello sir there is no result for Primary ID 50";
    // });
    // return $article; // matching result

    // $article = Article::findOr("50",function(){
    //     return "Hello sir there is no result for Primary ID 50";
    // });
    // return $article;
    // *custom error
});
  
Route::get("articles/where",function(){
    // where()
    // *retrieve all matching results
    // *get() to get object types

    // $articles = Article::where("user_id",2)->get();
    // return $articles;
    // -------------------------------------------------------

    // =asc/desc
    // $articles = Article::where("user_id",1)->orderBy("id","asc")->get(); // default
    // $articles = Article::where("user_id",1)->orderBy("id","desc")->get();
    // return $articles;
    // -------------------------------------------------------

    // $articles = Article::where("user_id",2)->orderBy("id","asc")->take(3)->get();
    // return $articles; // 6,7,8
    // $articles = Article::where("user_id",2)->orderBy("id","desc")->take(3)->get();
    // return $articles; // 10,9,8

    // $articles = Article::where("user_id",2)->take(3)->orderBy("id","desc")->get();
    // return $articles; // 10,9,8
    // *same result as orderBy()->take()

    // $articles = Article::where("user_id",2)->orderBy("id","asc")->limit(3)->get();
    // return $articles; // 6,7,8
    // ------------------------------------------

    // $article = Article::where("user_id",2)->first();
    // return $article; 

    // $articles = Article::where("id",">",3)->get();
    // return $articles; // 4,5,....9,10

    // $article = Article::where("id",2)->get();
    // return $article; // Array type
    // $article = Article::where("id",2)->first();
    // return $article; // Object type
    
    // $article = Article::where("user_id",2)->select("user_id","title","description")->first();
    // return $article;

    // $articles = Article::where("user_id",2)->pluck("title"); // array
    $articles = Article::where("user_id",2)->pluck("title","id"); // object
    // dd($articles);
    return $articles;

    // $article = Article::firstWhere("user_id",2);
    // return $article;

    // $articles = Article::where("user_id",">",5)->get();
    // $articles = Article::where("id",">",55)->get(); // empty array
    // return $articles;
    
    // $article = Article::where("id",">",5)->firstOrFail(); 
    // $article = Article::where("id",">",50)->firstOrFail(); // 404 NOT FOUND 
    // return $article;

    // firstOr(callback)
    // $article = Article::where("user_id",3)->firstOr(function(){
    //     return "Hello sir there is no result for User ID 3";
    // }); 
    // return $article;
});

// =>Retrieving Aggregates

Route::get("articles/aggregates",function(){
    // return "hello";

    $data = [
        ["price"=>100],
        ["price"=>200],
        ["price"=>300],
        ["price"=>400]
    ];

    
    // var_dump($data); // array
    // echo "<br/>";
    // var_dump(collect($data)); // object
    // on object can use aggregates functions 

    // dd(
    //     $data,
    //     collect($data)
    // );

    // =>count()
    // return collect($data)->count(); // 4

    // =>max()
        // return collect($data)->max(); // {"price":400}

        
        // return collect($data)->max(function($num){
        // $result = collect($data)->max(function($num){
        //     return $num["price"];
        // });
        // return $result; // 400

        // *self study
        // return collect($data)->max("price"); // 400

        // $students = collect([
        //     ['name' => 'Alice', 'score' => 85],
        //     ['name' => 'Bob', 'score' => 92],
        //     ['name' => 'Carol', 'score' => 78],
        // ]);
        // return $maxScore = $students->max("score");

    // =>min()
        // return collect($data)->min(); // {"price":100}
        // $result = collect($data)->min(function($num){
        //     return $num["price"];
        // });
        // return $result; // 100


    // =>average()
        // return collect($data)->average(); // *error
            
        // return collect($data)->average(function($num){
        //     return $num["price"];
        // });
        // return collect($data)->avg(function($num){
        //     return $num["price"];
        // }); // 250

        // *self study
        // $result = collect([1, 1, 2, 4])->avg();
        // echo $result; //2


    // =>sum()
    // return collect($data)->sum(function($num){
    //     return $num["price"];
    // }); // 1000

    // -------------------------------------

    $articles = Article::all()->count();
    // return $articles; // 10 articles

    // $articles = Article::where("user_id",1)->count();
    // return $articles; // 5 articles

    // $articles = Article::where("user_id",2)->max("rating");
    // return $articles; // 4

    // $articles = Article::where("user_id",1)->min("rating");
    // return $articles; // 2

    // $articles = Article::where("user_id",1)->average("rating");
    // $articles = Article::where("user_id",1)->avg("rating");
    // return $articles; // 3.6000

    // $articles = Article::where("user_id",1)->sum("rating");
    // return $articles; // 18
});
// ---------------------------------------

// =>Retrieving Or Creating Data to Models

Route::get("articles/create",function(){
        // $article = Article::firstOrCreate([
        //     "title"=>"this is new article 1"
        // ]);
        // return "Retrieve Data or Insert $article";


        // $article = Article::firstOrCreate([
        //     "title"=>"this is new article 11"
        // ]);
        // return "Retrieve Data or Insert $article";
        // * Mass Assignment Error

            // $article = Article::firstOrCreate([
            //     "title"=>"this is new article 11",
            //     "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            //     "user_id"=>3,
            //     "rating"=>5
            // ]);

            // only not existing row in the table inserted
            // $article = Article::firstOrCreate([
            //     "title"=>"this is new article 12",
            //     "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            //     "user_id"=>3,
            //     "rating"=>2
            // ]);
            // 13, 14, 15, 16

            // $article = Article::firstOrCreate(
            //     ["title"=>"this is new article 17"],
            //     [
            //         "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            //         "user_id"=>1,
            //         "rating"=>5
            //     ]
            // );

            $article = Article::firstOrCreate(
                ["title"=>"this is new article 17"],
                [
                    "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                    "user_id"=>1,
                    "rating"=>2
                ]
            );

            return "Retrieve Data or Insert $article";
});

Route::get("articles/filter",function(){
    // echo "hay";
    // $articles = Article::all();
    // $articles = Article::get();
    

    // foreach($articles as $article){
    //     echo "$article->id <br/> $article->title <br/> $article->description <hr/>";
    // }

    // all() can also use
    // $articles = Article::get()->filter(function($article){
    //     return $article->id > 5;
    // });

    $articles = Article::cursor()->filter(function($article){
        return $article->id > 3;
    });
    

    return $articles;

});

Route::get("articles/reject",function(){
    // return "hay";

    $data = [
        100,
        200,
        300,
        0,
        "0",
        1,
        "1",
        "aung aung",
        '',
        ' ',
        null,
        true,
        false,
        [],
        ["red","green","blue"],
        ["price"=>100]
    ];

    // dd(
    //     $data,
    //     collect($data)
    // );
    // array, object

    $collections = collect($data);
    // return $collections->reject(); // {"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
    
    // return $collections->reject(function($value){
    //     return empty($value); // {"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}}
    // }); 

    return $collections->filter(function($value){
        // return $value; // {"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}
        // return empty($value); //  {"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
        
        // return is_numeric($value); // [100,200,300,0,"0",1,"1"]
        return is_string($value); // {"4":"0","6":"1","7":"aung aung","8":"","9":" "}
        // return is_bool($value); // {"11":true,"12":false}
        // return is_array($value); // {"13":[],"14":["red","green","blue"],"15":{"price":100}}
        // return is_null($value); // {"10":null}
    }); 
});


// =>whereColumn("column1","column2"); // compare and result same value
// =>whereColumn("column1",comparison operator,"column2"); // compare and result same value
// =>whereColumn([],[]); // multi compare and result same value
Route::get("article/wherecolumn",function(){
    // return "hay";

    // $articles = Article::whereColumn("id","user_id")->get();
    // return $articles;
    // = "articles" table update "user_id" on phpmyadmin

    // $articles = Article::whereColumn("created_date","updated_date")->get();
    // return $articles;

    // $articles = Article::whereColumn("updated_date",">","created_date")->orderByDesc("id")->get();
    // return $articles;
    // ="articles" table update "updated_date" on phpmyadmin

    // $articles = Article::whereColumn([
    //     ['id','user_id']
    // ])->get();
    // return $articles;

    $articles = Article::whereColumn([
        ['id','user_id'],
        ["created_date","updated_date"]
    ])->get();
    return $articles;
});

Route::get("articles/insert",function(){
    // Method 1
    // $article = new Article();
    // $article->title = "this is new article 18";
    // $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    // $article->user_id = 1;
    // $article->rating = 3;
    // $article->save();
    // return "Data Inserted $article";
    

    // Method 2
    // $article = Article::create([
    //     "title"=> "this is new article 22",
    //     "description"=> "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    //     "user_id" => 2,
    //     "rating" => 5
    // ]);
    // return "Data Inserted $article";

    // *multi reload can insert multiple row
    // *above two method have its own unique advantages.
    // image file uploading to database need to write multi line of codes
    // in this situation object->columnname method is useful

    // => Date Time Explanation And Configuration

        // echo now(); // 2023-07-29 14:28:36
        // echo "<br/>";
        // var_dump(now()); // object
        // echo now()->toDateTimeString(); // 2023-07-29 14:30:08
        // echo "<br/>";
        // var_dump(now()->toDateTimeString()); // string

        // To change as client location's timezone, Google: php timezone
        // echo now()->toDateTimeString();                  // 2023-07-29 14:33:15 // As laravel server timezone
        // echo "<br/>";
        // echo now("Asia/Yangon")->toDateTimeString();     // 2023-07-29 21:03:15
        // echo "<br/>";
        // echo now("Asia/Bangkok")->toDateTimeString();    // 2023-07-29 21:33:15

        // echo date("Y-m-d H:i:s"); // 2023-07-29 14:36:41 // As laravel server timezone
        
        //* use Carbon\Carbon;
        // $curdatetime = Carbon::now();
        // echo $curdatetime; // 2023-07-29 14:36:41 // As laravel server timezone
        // var_dump($curdatetime); // object

        // -------------------------------------------

        // $getdate = now()->toDateTimeString();
        $getdate = now("Asia/Yangon")->toDateTimeString(); 

        // $today = date("Y-m-d H:i:s");

        // date_default_timezone_set("Asia/Bangkok");
        $curdatetime = Carbon::now();
        
        
        $article = DB::table("articles")->insert([
            "title"=> "this is new article 5",
            "description"=> "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            "user_id" => 2,
            "rating" => 5,

            // "created_date"=> now(),          // 2023-07-29 14:36:41 (server time)
            // "updated_date"=> now(),          // 2023-07-29 14:36:41

                                                // before customized    |   after customized now()
                                                // (server time)            (right time)
            // "created_date"=> $getdate,       // 2023-07-29 14:36:41  |   2023-07-29 21:03:15
            // "updated_date"=> $getdate,       // 2023-07-29 14:36:41  |   2023-07-29 21:03:15

            // "created_date"=> $getdate,       // 2023-07-29 21:03:15  // (right time) yangon
            // "updated_date"=> $today,         // 2023-07-29 14:36:41  // (server time)
                                                
                                                // before change laravel timezone       | after change laravle timezone        |   after customized date_default_timezone_set()
                                                // (right time) yangon                    (right time) yangon                      (right time) yangon
                                                // (server time)                                                                   (right time) bangkok
            "created_date"=> $getdate,          // 2023-07-29 21:03:15                  | 2023-07-29 21:03:15                  |   2023-07-29 21:03:15
            "updated_date"=> $curdatetime,      // 2023-07-29 14:36:41                  | 2023-07-29 21:03:15                  |   2023-07-29 21:33:15 
        ]);
        return "Data Inserted $article"; // Data Inserted 1

});

        // =>Change Laravel Timezone
        //      = Method 1
        //          config > app.php
        //              timezone' => 'Asia/Yangon',
        //     
        //          php artisan config:clear 
        //          *sometime if doen't immediately know the config changes, in this case this command needed to order in order to reflect changes without closing ther server
        //      = Method 2
        //          .env
        //              APP_TIMEZONE="Asia/Bangkok" // setting environment variable at .env file
        //          
        //          config > app.php
        //          "timezone" => env("APP_TIMEZONE","UTC"), // accessing the env variable
        //                          env(name,defaultvalue)
        //                          *if the variable is not found in .env, then use default value instead
                    

Route::get("articles/update",function(){
    // = Single Update
    //     $article = Article::find(1);
    //     $article->title = "this is new article 01";
    //     $article->save();

    //     $article = Article::findOrFail(10);
    //     $article->title = "this is new article 010";
    //     $article->user_id = 4;
    //     $article->save();

    //     return "Data Updated $article"; // article object


    // = Mass Updates
    //      $article = Article::where("rating",1)->update(["rating"=>2]);
    
    //      $article = Article::where("user_id",2)
    //                          ->where("rating",5)
    //                          ->update(["rating"=>3]);


    // return "Data Updated = $article"; // Data Updated = 2


    $article = Article::updateOrCreate(
        ["title"=>"this is new article 01","description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry."],
       
        ["user_id"=>1,"rating"=>5]
    );

    $article = Article::updateOrCreate(
        ["title"=>"this is new article 12","description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry."],
    //  ["title"=>"this is new article 12","description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.."],
        
        ["user_id"=>1,"rating"=>5]
    );
    return "Data Updated Successfully = $article";
    // update data if exixts OR create data if not exists
});

Route::get("articles/delete",function(){
    // = Permanent delete
        // $article = Article::find(1);
        // $article = Article::findOrFail(2);
        // $article->delete();
        // return "Data Delete Successfully = $article";

        // $article = Article::where("rating",2)->delete();
        // return "Data Delete Successfully = $article"; // Data Delete Successfully = 4


            // = Bulk Delete (Note :: must be primary key)
            //     $article = Article::destroy(1);         // Data Delete Successfully = 1
            //     $article = Article::destroy(10,11);     // Data Delete Successfully = 2

            //     $article = Article::destroy([1,2,3,4]);
            //     $article = Article::destroy(collect([7,8,9]));
            //     return "Data Delete Successfully = $article";

        // - permanent delete constaltly remove the item from the table, it can't bring back

    // = truncate ( Be Careful & ID will start from 1 again )
    // Article::truncate();
    // return "Data truncate successfully";
    // - to delete all data from table and then restart id from 1

    // => Soft Delete

        // $article = Article::findOrFail(5);
        // $article->delete();

        // $article = Article::destroy(13,14,15);

        // $article = Article::destroy([19,20]);

        $article = Article::destroy(collect([21,22]));

        return "Soft Delete Successfully = $article";
        
        // -soft delete is to prevent the item from permanently delete
        // it will temporarily delete the item and can be restored
        // -if the item is deleted, it will record the deleted date time at 'deleted_at' column
});

Route::get("articles/restore",function(){

    // $articles = Article::all();
    // return $articles; 
    //
    // - soft deleted row not include
    // - it will check condition of deleted_at column, 
    //        if it is null, it consider the item is not deleted and can be retrieved
    //        if it record date time, it conider the item is deleted and can't retrived

    // Article::withTrashed()->restore();
    // return "Restore From Trash Successfully";
    // 
    // - all 'deleted_at' column is set to null and can access again

    Article::withTrashed()
        ->where("rating",5)
        ->restore();
    return "Restore From Trash Successfully";
    // - only the specific item that match condition will be restored
});

Route::get("articles/forcedelete",function(){
    

    // $article = Article::findOrFail(5);
    // $article->delete();

    // $article = Article::findOrFail(6);
    // $article->forceDelete();

    // Result = 404 not found. cuz 21 is already in soft delete
    // $article = Article::findOrFail(21);
    // $article->forceDelete();

    // Result = 404 not found. cuz 21 is already in soft delete
    $article = Article::findOrFail(21);
    $article->delete();
    
    return "Data Force Delete Successfully";

    // - it will permanently delete the unnecessary data
    // - but it can only delete the item that is not in soft deleted before
    // - because findOrFail() will search the undeleted item
});

Route::get("articles/gettrash",function(){
    // $articles = Article::all();
    // return $articles; // not include from trash

    // $articles = Article::withTrashed()->get();
    // return $articles; // all include from trash & non trash

    // $articles = Article::withTrashed()
    // ->where("rating",3)
    // ->get();
    // return $articles; // all inc from trash & non trash by rating 3

    // $articles = Article::onlyTrashed()->get();
    // return $articles; // all from trash only

    // $articles = Article::onlyTrashed()
    //     ->where("rating",3)
    //     ->get();
    // return $articles; // all from trash only by rating 3

    $articles = Article::onlyTrashed()->findOrFail(5);
    return $articles; // can access the item in the trash
});

Route::get("articles/restoresingle",function(){

    // $article = Article::findOrFail(5);
    // return $article; // 404 NOT FOUND

    $article = Article::onlyTrashed()
                ->findOrFail(5)
                ->restore();
    return $article; // 1

});

// -------------------------------------------------

// => Eloquent Relationships
// =One to One

Route::get("users/{id}/article",function($id){
    $article = User::findOrFail($id)->article->title;
    // $article = User::findOrFail($id)->article->description; 
    // $article = User::findOrFail($id)->article->rating; 
    return $article;
});
// which user write which articles
// * use App\Models\User;

Route::get("article/{id}/user",function($id){
    // $article = Article::findOrFail($id)->user->name;
    $article = Article::findOrFail($id)->user->email;
    return $article;
});
// which article is written by which user

// -------------------------------------------------
// =One to Many

Route::get("articles/{id}/byuser",function($id){
    $user = User::findOrFail($id);
    // return $user->articles;
    
    foreach($user->articles as $article){
        // echo $article."<br/>";
        echo $article->title."<br/>";
    }

});
// get articles by the user

// =Many to Many
Route::get("user/{id}/role",function($id){
    // $user = User::findOrFail($id);
    // return $user->roles;
    // [{"id":3,"name":"viewer","created_at":null,"updated_at":null,"pivot":{"user_id":2,"role_id":3}},{"id":4,"name":"subscriber","created_at":null,"updated_at":null,"pivot":{"user_id":2,"role_id":4}}]
    // "pivot" table from "role_user"
    //  front table from "roles"

    // foreach($user->roles as $role){
    //     echo $role->name."<br/>";
    // }

    $user = User::findOrFail($id)->roles()->get();
    // $user = User::findOrFail($id)->roles()->orderBy("id","asc")->get();
    return $user;
});
// which user get which roles

Route::get("users/{id}/rolecreate",function($id){
    $user = User::findOrFail($id);

    foreach($user->rolecreatedate as $role){
        echo $role->pivot->created_at."<br/>";
    }
});

// ----------------------------------------------------
// =Has Many Through

Route::get("genders/{id}/article",function($id){
    $gender = Gender::findOrFail($id);

    foreach($gender->articles as $article){
        echo $article->title."<br/>";
    }
});
// ----------------------------------------------------

// = Polymorphic Relationship

Route::get("users/{id}/photo",function($id){

    $user = User::findOrFail($id);

    foreach($user->photos as $photo){
        echo $photo->path."<br/>";
    }
});

Route::get("articles/{id}/photo",function($id){

    $article = Article::findOrFail($id);

    foreach($article->photos as $photo){
        echo $photo->path."<br/>";
    }
});

// = Reverse Thinking
Route::get("photos/{id}/result",function($id){

    // $photo = Photo::findOrFail($id);
    // return $photo->imageable; // can result row from both article and user
    // return $photo->imageable->title; // It is fine whent id is article and it can out empty when id is user.

    $photo = Photo::findOrFail($id);
    return $photo->phototable; 
});
// ----


Route::get("articles/{id}/comment",function($id){

    $article = Article::findOrFail($id);

    foreach($article->comments as $comment){
        echo $comment->message."<br/>";
    }
});

Route::get("users/{id}/comment",function($id){

    $user = User::findOrFail($id);

    foreach($user->comments as $comment){
        echo $comment->message."<br/>";
        // return $comment."<br/>";
    }
});

// =>Polymorphic Relationship Many to Many

Route::get("items/{id}/tag",function($id){
    $item = Item::findOrFail($id);
 
    foreach($item->tags as $tag){
         echo $tag->name."<br/>";
    }
});

Route::get("tag/{id}/article",function($id){
    $tag = Tag::findOrFail($id);

     foreach($tag->articles as $article){
        echo $article->title."<br/>";
    }
});

Route::get("tag/{id}/item",function($id){
    $tag = Tag::findOrFail($id);

    foreach($tag->items as $item){
         echo $item->name."<br/>";
    }
});

// --------------------------------------------------
// Relationship crud
Route::get("users/{id}/phone/insert",function($id){
    $user = User::findOrFail($id);

    // =Method 1
        // $phone = new Phone();
        // $phone->number = "09444444";
        // $phone->user_id = $user->id; // it can be inserted from route id - $phone->user_id = $id;
        // $phone->save();
        // return "Data Inserted";


    // =Method2
        // $phone = Phone::create([
        //     "number" => "09555555",
        //     "user_id" => $user->id
        // ]);
        // return "Data Inserted";

    // =Method3
        // $phone = new Phone([
        //     "number" => "09666666",
        //     "user_id" => $user->id
        // ]);
        // $user->phone()->save($phone);
        // return "Data Inserted";
        
        // =Method4

        // $phone = new Phone([
        //     "number" => "09888888",
        // ]);
        // $user->phone()->save($phone);
        // return "Data Inserted";

        // - it can be inserted even without filling the user_id
        // - selected user is the priority

        // =Method5

            // $user->phone()->save( new Phone([
            //         "number" => "09111111",
            //         "user_id" => $user->id
            // ]));
            // return "Data Inserted";

        // =Method6 (no need user id)

            $user->phone()->save( new Phone([
                    "number" => "09222222"
            ]));
            return "Data Inserted";
});
// - insert phone for the user


Route::get("users/{id}/phone/update",function($id){
    // = Single Update
        // $phone = Phone::whereUserId($id)->first(); 
        // $phone->number = "09-111-111";
        // $phone->save();
        // return $phone;
        // return "Data Updated";

    // * whereUserId($id) - created by laravel to validate user_id column 


    // = Multi Update
    $phones = Phone::whereUserId($id)->get();
    foreach($phones as $phone){
        $phone->number = "09-111-112";
        $phone->save();
    }
    return "Data Updated";

    // If $phone->save(); is added after loop, it will only update the last item 
    // to save all the matching items, it must be added in the loop
});

Route::get("users/{id}/phone/read",function($id){
    $user = User::findOrFail($id);
    $user = $user->phone->number;

    return "Data Reading = $user";
});
// to get user's phone number

Route::get("users/{id}/phone/delete",function($id){
    // = single delete
        // $user = User::findOrFail($id); 
        // $user = $user->phone->delete();
        // return "Data Deleted";
        // - it will only delete first single row

    // bulk delete
        $user = User::findOrFail($id); 
        $user = $user->phone()->delete();
        return "Data Deleted";
        // - it will delete all rows
});
// ------------------------------------------------------
// =>Eloquent One to Many Relationship / hasMany(class)

Route::get("users/{id}/article/insert",function($id){
    $user = User::findOrFail($id);

    // =Method 1
        // $article = new Article();
        // $article->title = "this is new article 23";
        // $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        // $article->user_id = $id;
        // $article->rating = 5;
        // $article->save();
        // return "Data Inserted";


    // =Method2
        // $article = Article::create([
        //     "title" => "this is new article 24",
        //     "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        //     "user_id" => $id,
        //     "rating" => 3,
        // ]);
        // return "Data Inserted";

    // =Method3
        // $article = new Article([
        //     "title" => "this is new article 25",
        //     "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        //     "user_id" => $id,
        //     "rating" => 3,
        // ]);
        // $user->articles()->save($article);
        // return "Data Inserted";

        // =Method4
            // $article = new Article([
            //     "title" => "this is new article 26",
            //     "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            //     "rating" => 3,
            // ]);
            // $user->articles()->save($article);
            // return "Data Inserted";
        
        // =Method5
            // $user->articles()->save(new Article([
            //     "title" => "this is new article 27",
            //     "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            //     "user_id" => $user->id,
            //     "rating" => 5,
            // ]));
            // return "Data Inserted";

        // =Method6 (no need user id)

            $user->articles()->save(new Article([
                "title" => "this is new article 28",
                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                "rating" => 5,
            ]));
            return "Data Inserted";
});

Route::get("users/{id}/article/update",function($id){
    //= Single Update
        // $article = Article::whereUserId($id)->first(); 
        // $article->title = "this is new article 29";
        // $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        // $article->rating = 1;
        // $article->save();
        // return "Data Updated";

    // = Bulk Update
        // $articles = Article::whereUserId($id)->get();
        // return articles;
        // foreach($articles as $article){
        //     $article->title = "this is new article 001";
        //     $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        //     $article->rating = 5;
        //     $article->save();
        // }
        // return "Data Updated";

    // One to Many relation update
    // = Single Update
        // $user = User::findOrFail($id); 
        // $user->articles()->where("id","=","16")->update([
        //     "title" => "this is new article 1000",
        //     "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        //     "rating" => 1
        // ]);
        // return "Data Updated";

    // = Bulk Update
        $user = User::findOrFail($id); 
        $user->articles()->where("rating","=","5")->update([
            "title" => "this is new article 1000",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            "rating" => 1
        ]);
        return "Data Updated";
        // modify article(s) written by the user
});

Route::get("users/{id}/article/read",function($id){
    $user = User::findOrFail($id);

    foreach($user->articles as $article){
        echo $article->title."<br/>";
    }
});
// articles written by the user
// many rows since it relation ship is One to Many

Route::get("users/{id}/article/delete",function($id){
    // Beware:: In this case Article took soft delete.

    // Note:: error, cuz this is one to many relationship
    // $user = User::findOrFail($id); 
    // $user = $user->articles->delete();
    // return "Data Deleted";

    // = Single delete
        // $user = User::findOrFail($id); 
        // $user = $user->articles()->whereId("23")->delete(); 
        // return "Data Deleted";
        // whereId() - created by laravel to validate id column
    
    // = Bulk delete
        $user = User::findOrFail($id); 
        $user = $user->articles()->delete();
        return "Data Deleted"; 
});
// ------------------------------------------------------
// =>Eloquent Many to Many Relationship / belongsToMany(class)

Route::get("users/{id}/role/insert",function($id){
    // Note:: action to Role and Userroles
    $user = User::findOrFail($id);
    $user->roles()->save(new Role([
        "name"=>"adviser"
    ]));
    return "Data Inserted";
});
// - create new row and insert this role for the user
// - affect the both "roles" and "userfoles" tables
// - *use in another case by applying the concept example gps and ticketing
// "roles" table
//      id  name        created_at              updated_at
//      5   adviser     2023-09-09 21:51:42     2023-09-09 21:51:42
// 
// "userroles" table
//      id  user_id     role_id     created_at  updated_at
//      9   1           5           NULL        NULL


Route::get("user/{id}/role/update",function($id){
    $user = User::findOrFail($id);
    
    if($user->has("roles")){
        foreach($user->roles as $role){
            // echo $role->name; // admin adviser
            if($role->name === "adviser"){
                $role->name = "co-worker";
                $role->save();
            }
        }
    }
    return "Data Updated";

    // has() is for checking whether a method is exist or not in the class
    // -if method doesn't exist, it will get laravel error from try catch (Call to undefined method App\Models\User::role())
    // and it will not go through else statements

});

Route::get("user/{id}/role/read",function($id){
    $user = User::findOrFail($id);
    
    if($user->has("roles")){
        foreach($user->roles as $role){
            echo $role->name ."<br/>";
        }
    }

});
// to get the user's roles 
// return many rows from dummy table since it is Many to Many relationship


Route::get("users/{id}/role/delete",function($id){
    //= Single Delete
        // $user = User::findOrFail($id);
        // foreach($user->roles as $role){
        //     $role->whereId(4)->delete();
        // }
        // return "Data Deleted";

    //= Bulk Delete
        $user = User::findOrFail($id);
        $user->roles()->delete();
        return "Data Deleted";
});
// roles deleted which the user granted in "roles"
// but still remain related record in "userroles" table 
// -it is very dangerous because if admin role is deleted for the user, 
//  other users getting admin role also lose their role

Route::get("users/{id}/role/attach",function($id){
    $user = User::findOrFail($id);

    // Note:: check Role table & UserRole table (no-action/action)
    // Note:: added role permission to user_id
    $user->roles()->attach(5);

    return "Data Attached";
});
// grant the user to another role
// In "roleusers", create new row for the user

Route::get("users/{id}/role/detach",function($id){
    $user = User::findOrFail($id);

    $user->roles()->detach();

    return "Data Detached";
});
// -discard permissions for the user
// In "roleusers" table, records related with the user are deleted
// In "roles" table, nothing change.

Route::get("users/{id}/role/sync",function($id){
    // Note:: check Role table & UserRole table (no-action/action)
    
    $user = User::findOrFail($id);
    // Meaning:: want to keep only role id 2 for refer user_id
    // $user->roles()->sync(2);

    // Meaning:: want to keep only role id 2,4 for refer user_id
    // $user->roles()->sync([2,4]);

    // Meaning:: want to keep existing role id 2,4 and add more id 1,5 for refer user_id
    $user->roles()->sync([1,2,4,5]);


    return "Data Synced";
});
// grant the user as specify roles
// -* At userfoles table, 
// -if user have extra roles, delete the record
// - if user need role, add new record

// -------------------------------------------------
// => Eloquent Polymorphic Relationship

Route::get("users/{id}/photo/insert",function($id){
    $user = User::findOrFail($id);

    $user->photos()->save(new Photo([
        "path" => "public\assets\photo\profile1.jpg"
    ]));
    return "Data Inserted";

});
// add image for the user
// Auto inserted 'imageable_id' "imageable_type" from user id and the class namespace of App\Models\User

Route::get("articles/{id}/photo/insert",function($id){
    $article = Article::findOrFail($id);

    $article->photos()->create([
        "path" => "public\assets\photo\article5.jpg"
    ]);

    return "Data Inserted";
});
// Auto inserted 'imageable_id' "imageable_type" from article id and the class namespace of App\Models\Article

Route::get("users/{id}/photo/read",function($id){
    $user = User::findOrFail($id);

    if($user->has("photos")){
        foreach($user->photos as $photo){
            echo $photo->path."<br/>";
        }
    }
});
// which user has which photos


Route::get("users/{id}/photo/update",function($id){
    $user = User::findOrFail($id);

    $photo = $user->photos()->whereId(9)->first();
    $photo->path = "public\assets\photo\userprofile1.jpg";
    $photo->save();

    return "Data Updated";
});
// user's photo of id filtered updated

Route::get("users/{id}/photo/updateimgtype",function($id){
    $user = User::findOrFail($id);
    $photo = Photo::findOrFail(16);

    $user->photos()->save($photo); // Update for App\Models\Article to App\Model\User

    return "Data Updated";
});
// update existing 'photos' record with "user_id" and class namespace App\Model\User
// "userroles" 
//      id path                                 imageable_id    imageable_type      created_at          updated_at 
// before update     
//      16 public\assets\photo\article5.jpg     5               App\Models\Article  2023-11-30 16:31:20 2023-11-30 16:31:20
// after update
//      16 public\assets\photo\article5.jpg     1               App\Models\User  2023-11-30 16:31:20 2023-11-30 16:31:20

Route::get("users/{id}/photo/delete",function($id){
    // = Single Delete
    // $user = User::findOrFail($id); 
    // $user->photos()->whereId(9)->delete();
    // return "Data Deleted";


    // = Bulk Delete
    $user = User::findOrFail($id); 
    $user->photos()->delete();
    return "Data Deleted";
});
// delete photo(s) of the user

// ---------------------------------------------------
// => Eloquent Polymorphic Relationship (Many to Many Relationship)

Route::get("items/tag/{id}/insert",function($id){
    // Note:: check Item table & Taggalbe table (action / action)
    $item = Item::create([
        "name"=>"Joey"
    ]);

    $tag = Tag::findOrFail($id); // beverage 2
    $item->tags()->save($tag);

    return "Data Inserted";
});
// when new item is created, it attach with tag
// In "item" table
//      id  name    created_at          updated_at
//      8   Joey    2023-11-30 18:20:40 2023-11-30 18:20:40
// In "taggable" table
//      id tag_id   taggable_id     taggable_type   created_at  updated_at
//      9  2        8               App\Models\Item NULL        NULL

Route::get("items/{id}/tag/read",function($id){
    $item = Item::findOrFail($id);

    if($item->has("tags")){
        foreach($item->tags as $tag){
            echo $tag->name."<br/>";
        }
    }
});

Route::get("items/{id}/tag/update",function($id){
    // $item = Item::findOrFail($id);

    // if($item->has("tags")){
    //     foreach($item->tags as $tag){
    //         return $tag->whereId(4)->update([
    //             "name"=>"Insect Killer"
    //         ]);
    //     }
    // }
    // return "Data Updated";

    // $item = Item::findOrFail($id); // create
    // $tag = Tag::findOrFail(4);
    // $item->tags()->save($tag);
    // return "Data Created";

    // $item = Item::findOrFail($id); // added
    // $tag = Tag::findOrFail(6);
    // $item->tags()->attach($tag);
    // return "Data Attached";

    $item = Item::findOrFail($id); // remove or added if not data exist
    $item->tags()->sync([1,2]);
    return "Data Synced";
});

Route::get("items/{id}/tag/delete",function($id){
    // = Single Delete
    // $item = Item::findOrFail($id); 
    // if($item->has("tags")){
    //         foreach($item->tags as $tag){
    //             return $tag->whereId(6)->delete();
    //         }
    // }
    // return "Data Deleted";

    // = Bulk Delete
        $item = Item::findOrFail($id); 
        $item->tags()->delete();
        return "Data Deleted";
});
// -----------------------------------------------------------------

// => Form CRUD
        // * use \App\Http\Controllers\CountriesController;
        Route::resource("countries",CountriesController::class);
        
        // Route::resource("countries",CountriesController::class)->except("destroy");
        // Route::get("countries/delete/{id}",[CountriesController::class,"destroy"])->name("countries.delete");

// Date formattt
Route::get("/dates",function(){
    //=> PHP DateTime Class
        $date = new DateTime();
        echo $date->format("d m Y"); // 07 10 2023
        echo "<br/>";

        echo $date->format("Y m d"); // 2023 10 07
        echo "<br/>";

        echo $date->format("m d Y"); // 10 07 2023
        echo "<br/>";

        echo $date->format("d/m/Y"); // 07/10/2023
        echo "<br/>";

        echo $date->format("d-m-Y"); // 07-10-2023
        
        echo "<hr/>";

        $date = new DateTime("+5 day");
        echo $date->format("d m Y"); // 12 10 2023
        echo "<br/>";

        $date = new DateTime("+1 week"); // 14 10 2023
        echo $date->format("d m Y"); 
        echo "<hr/>";
    // --------------------------------------------
    //=> Laravel Carbon Class

        // *use Carbon\Carbon
        echo Carbon::now(); // 2023-10-07 20:41:16
        echo "<br/>";

        //=> addDays()

            echo Carbon::now()->addDays(10); // 2023-10-17 20:42:03
            echo "<br/>";

            echo Carbon::now()->diffForHumans(); // 1 second ago
            echo "<br/>";

            echo Carbon::now()->addDays(1)->diffForHumans(); // 23 hours from now
            echo "<br/>";

            echo Carbon::now()->addDays(3)->diffForHumans(); // 2 days from now
            echo "<br/>";

            echo Carbon::now()->addDays(10)->diffForHumans(); // 1 week from now
            echo "<br/>";

        // =>subDays()

            echo Carbon::now()->subDays(1); // 2023-10-06 20:48:27
            echo "<br/>";

            echo Carbon::now()->subDays(1)->diffForHumans(); // 1 day ago
            echo "<br/>";

            echo Carbon::now()->subDays(3)->diffForHumans(); // 3 days ago
            echo "<br/>";

            echo Carbon::now()->subDays(10)->diffForHumans(); // 1 week ago
            echo "<br/>";

        //=> addMonth()
            echo Carbon::now()->addMonths(1); // 2023-11-07 20:52:35
            echo "<br/>";

            echo Carbon::now()->addMonths(1)->diffForHumans(); // 4 weeks from now
            echo "<br/>";

            echo Carbon::now()->addMonths(3)->diffForHumans(); // 2 months from now
            echo "<br/>";

            echo Carbon::now()->addMonths(10)->diffForHumans(); // 9 months from now
            echo "<br/>";
        
        // =>subMonths()

            echo Carbon::now()->subMonths(1); // 2023-09-07 20:54:37
            echo "<br/>";

            echo Carbon::now()->subMonths(3)->diffForHumans(); // 3 months ago
            echo "<br/>";

            echo Carbon::now()->subMonths(10)->diffForHumans(); // 10 months ago
            echo "<br/>";

        // => yesterday() tomorrow()
            echo Carbon::now()->yesterday()->diffForHumans(); // 1 day ago
            echo "<br/>";

            echo Carbon::now()->tomorrow()->diffForHumans(); // 3 hours from now
            echo "<br/>";

        // diffForHumans() - different of current date to the specific date from the view of human
            // = future date
            // current date - 7 10 2023
            // target date  - 12 10 2023
            // human diff   = 4 days from now(do calculate date of 12)
            //                  it only calculate from current date to reach the target date      
            
            // = previous date 
            // current date - 7 10 2023
            // past date    - 5 10 2023
            // human diff   = 2 days ago (exactly calculate the past days)
});

Route::resource("products",ProductController::class);