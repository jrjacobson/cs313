<!DOCTYPE html>
<html>
  <head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- lightbox -->
  <link href="dist/css/lightbox.css" rel="stylesheet">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <style>
  img.thumbnailSmall{
    width: 30px;
    height: 25px;
  }
  </style>
  <title>Jason's Homepage</title>
  </head>

  <body>
    <div class="container">

      <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="hello.php">HelloWorld</a></li>
        <li role="presentation"><a href="assignments.php">Assignments</a></li>
      </ul>

      <div class = "jumbotron">
        <div class="container">
          <h1>Welcome to Jason's Homepage</h1>
          <p>This hompage is mostly for demonstration and will be used to
            demonstrate mainly the use of server side php.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <p>
            &emsp;This is my wonderful web page I will do my best to awe and amaze
            you. First I want to start off by introducing myself.
            My name is Jason Jacobson I am a Software Engineering major
            here at BUY-Idaho. I <strong>love</strong> to write code and goof
            around on my computer always looking for some new trick. Strangely
            I also love to run two summers ago I ran my first two marathons and
            last summer I competed in my first Olympic distance triathlon.
            To the right is a picture of me and my sister after I finished my
            first marathon. Sometimes I can't believe that actually happed.
            When I have free time I like to get out and do any type of training
            I can. I also really love to hike the more time I can spend up on
            top of a mountain the better.
          </p>
        </div>

        <div class="col-md-4">

            <div class="row" >
              <a href="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/10614278_10101566458511559_2088256542744242551_n.jpg?oh=6363aa63714c9905eb3668f2d37e5e1c&oe=56FB2F00" data-title="Masa Falls Marathon" data-lightbox="slideshow" class="thumbnail">
                <img src="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/10614278_10101566458511559_2088256542744242551_n.jpg?oh=6363aa63714c9905eb3668f2d37e5e1c&oe=56FB2F00" alt="Traci and Jason at mesa falls marathon" >
              </a>
            </div>
            <div class="row" style="margin:auto">
              <a href="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/11701094_10205619990191372_8801711872970030137_n.jpg?oh=b06daedbfddad743f5a0a5e7ac6b0ad3&oe=570A5F5F" data-title="Rigby Lake Tri" data-lightbox="slideshow" >
                <img src="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/11701094_10205619990191372_8801711872970030137_n.jpg?oh=b06daedbfddad743f5a0a5e7ac6b0ad3&oe=570A5F5F" alt="Rigby Lake tri" class="thumbnailSmall">
              </a>
              <a href="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/582383_4502534673755_1431628472_n.jpg?oh=590b6dae41ac7357a4d0bb4b9977b570&oe=56FDF854" data-title="Top of Mt. Teneriffe" data-lightbox="slideshow" >
                <img src="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/582383_4502534673755_1431628472_n.jpg?oh=590b6dae41ac7357a4d0bb4b9977b570&oe=56FDF854" alt="Top of Mt. Teneriffe" class="thumbnailSmall">
              </a>
              <a href="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/198880_3876003210860_967068004_n.jpg?oh=21fcac1e9f8184522f5ebb6ceaed9f0c&oe=570E844F" data-title="Snow Lake" data-lightbox="slideshow" >
                <img src="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/198880_3876003210860_967068004_n.jpg?oh=21fcac1e9f8184522f5ebb6ceaed9f0c&oe=570E844F" alt="Snow Lake" class="thumbnailSmall">
              </a>
            </div>


        </div>
      </div>

    </div>
    <script src="dist/js/lightbox-plus-jquery.js"></script>
  </body>
</html>
