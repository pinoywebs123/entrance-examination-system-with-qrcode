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
                    <li >
                      <a href="{{route('admin_examination')}}" ><i class="glyphicon glyphicon-pencil pull-right"></i> Examination</a>
                    </li>
                    <li class="active">
                      <a href="{{route('admin_student_list')}}" ><i class="glyphicon glyphicon-education pull-right"></i> Student List</a>
                    </li>
                     
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
          <h2 class="text-center">Student Answer</h2>

          <div class="row">
            <table class="table">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Student Answer</th>
                  <th>Corrent Answer</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                @foreach($exams as $ex)
                  <tr>
                    <td>{{$ex->exam->question}}</td>
                    <td>{{$ex->exam->answer->answer}}</td>
                    <td>{{$ex->answer}}</td>
                    <td>
                      @if($ex->exam->answer->answer == $ex->answer)
                        <i class="glyphicon glyphicon-ok" style="color: green;"></i>
                      @else
                        <i class="glyphicon glyphicon-remove" style="color: red;"></i>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

           <center> {{$exams->links()}}</center>
          </div>

        </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
 

</body>

</html>
