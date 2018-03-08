<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NORSU BCC Entrance Examination</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

 

<style type="text/css">
    #txt{
        font-size: 48px;
    }
    .navbar {
     background: #2980b9 !important;
   }
   #sides ul {
    background: #2980b9 !important;
    
   }
   #sides ul li a{
    color: #fff !important;
   }
   body {
    background: #2c3e50;
   }
   span{
    font-size: 40px;
   }

  .dropdown a{
    color: #f39c12 !important;
  }

   body {
    background-color: #323232 !important;
   }

   .hovereffect {
width:100%;
height:100%;
float:left;
overflow:hidden;
position:relative;
text-align:center;
cursor:default;
}

.hovereffect .overlay {
width:100%;
height:100%;
position:absolute;
overflow:hidden;
top:0;
left:0;
opacity:0;
background-color:rgba(0,0,0,0.5);
-webkit-transition:all .4s ease-in-out;
transition:all .4s ease-in-out
}

.hovereffect img {
display:block;
position:relative;
-webkit-transition:all .4s linear;
transition:all .4s linear;
}

.hovereffect h2 {
text-transform:uppercase;
color:#fff;
text-align:center;
position:relative;
font-size:17px;
background:rgba(0,0,0,0.6);
-webkit-transform:translatey(-100px);
-ms-transform:translatey(-100px);
transform:translatey(-100px);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
padding:10px;
}

.hovereffect a.info {
text-decoration:none;
display:inline-block;
text-transform:uppercase;
color:#fff;
border:1px solid #fff;
background-color:transparent;
opacity:0;
filter:alpha(opacity=0);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
margin:50px 0 0;
padding:7px 14px;
}

.hovereffect a.info:hover {
box-shadow:0 0 5px #fff;
}

.hovereffect:hover img {
-ms-transform:scale(1.2);
-webkit-transform:scale(1.2);
transform:scale(1.2);
}

.hovereffect:hover .overlay {
opacity:1;
filter:alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover a.info {
opacity:1;
filter:alpha(opacity=100);
-ms-transform:translatey(0);
-webkit-transform:translatey(0);
transform:translatey(0);
}

.hovereffect:hover a.info {
-webkit-transition-delay:.2s;
transition-delay:.2s;
}
.badge{
  background-color: #e74c3c;
}

.thumbnail{
  margin-top: 10%;
}
.glyphicon{
  font-size: 20px;
}
#page-wrapper{
  height: 700px;
}
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test"></a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{Auth::user()->original}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                       
                         <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin_logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                    <li >
                      <a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-home pull-right"></i> Home</a>
                    </li>
                    <li >
                      <a href="{{route('admin_original')}}" ><i class="glyphicon glyphicon-list-alt pull-right"></i> Original No.</a>
                    </li>
                    <li class="active">
                      <a href="{{route('admin_examination')}}" ><i class="glyphicon glyphicon-pencil pull-right"></i> Examination</a>
                    </li>
                    <li>
                      <a href="{{route('admin_student_list')}}" ><i class="glyphicon glyphicon-education pull-right"></i> Student List</a>
                    </li>
                     
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
          <h2 class="text-center">Create New Examination</h2>
          <div class="row">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="{{route('admin_examination')}}">List</a></li>
              <li role="presentation" class="active"><a href="{{route('admin_create_examination')}}">Create Exam</a></li>
              
            </ul>

            <br>
            @if(Session::has('suc'))
              <div class="alert alert-success">
                <h3 class="text-center">{{Session::get('suc')}}</h3>
              </div>
            @endif
            <form class="col-md-6 col-md-offset-3" action="{{route('admin_create_examination_check')}}" method="POST">
              <div class="form-group">
                <label>Enter New Questions</label>
                <textarea name="question" class="form-control">What is the Questions?</textarea>
               
              </div>
              <div class="form-group">
                <label>Enter the answer</label>
                <input type="text" name="answer" class="form-control" placeholder="My answer here" required="">
              </div>
              <h3 class="text-center">Enter choices below</h3>

              <div class="form-group">
                
                <input type="text" name="a" class="form-control" placeholder="choice 1" required="">
              </div>
              <div class="form-group">
               
                <input type="text" name="b" class="form-control" placeholder="choice 2" required="">
              </div>
              <div class="form-group">
               
                <input type="text" name="c" class="form-control" placeholder="choice 3" required="">
              </div>
              <div class="form-group">
               
                <input type="text" name="d" class="form-control" placeholder="choice 4" required="">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="#" class="btn btn-default">Clear</a>
                {{csrf_field()}}
              </div>
            </form>
          </div>

        </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
 

</body>

</html>
