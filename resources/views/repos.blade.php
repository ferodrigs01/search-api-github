<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search repository</title>
        <style media="screen">
          h1,p{
            text-align: center;
          }
          body{
            background-color: #696969;
            color: #fff;
            text-align: center;
          }
          a{
            text-decoration: none;
            color: #fff;
            background-color: #ccc;
            padding: 5px;
          }
        </style>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript">

          $(document).ready(function(){

              var nome = "{{$user}}";
              var repos = 0; //start the variable with value 0
              $.ajax({ //start of the call ajax
              type:"GET",
              url:"https://api.github.com/users/"+nome,//url taking the username of repository
              async:false
              }).done(function(data){ // if the function is right do this
                repos = data.public_repos; //assigns the variable repos the value of the number of public repositories
              });

              if(repos == 0 || repos < 0){ //if you do not have a repository in your account
                $('body').append("<h1>There are no repositories with this user.</h1>");
              }else{

                $.ajax({ //start of the call ajax
                type:"GET",
                url:"https://api.github.com/users/"+nome+"/repos",//url taking the username on repository
                async:false
              }).done(function(data){ // if the function is right do this
                for(var i=0; i < repos; i++ ){ //counting the number of repositories
                  $('body').append('<h1>Repository '+(i+1)+'</h1>');
                  $('body').append("<p>"+data[i].id+"</p>");
                  $('body').append("<p>"+data[i].name+"</p>");
                  $('body').append("<p>"+data[i].description+"</p>");
                  $('body').append("<p>"+data[i].html_url+"</p>");
                  $('body').append('<hr>');
                }
              });

              }

          });


        </script>
    </head>
    <body>
      <p> <strong>For search</strong> write in url the username of your github account</p>
      <a href="/">Back to home</a>
    </body>
</html>
