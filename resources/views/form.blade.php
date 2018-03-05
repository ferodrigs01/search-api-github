<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style media="screen">
          table{
            width: 100%;
            text-align: center;
          }
          table td{
            padding: 10px;
            border: 1px solid #ccc;
          }
          table td img{
            width: 50px;
          }
        </style>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript">
        $(document).ready(function(){

          var nome = "{{$user}}";
          var global;
          $.ajax({ //start of the call ajax
        type:"GET",
        url:"https://api.github.com/users/"+nome,//url taking the username
        async:false
      }).done(function(data){ // if the function is right do this
        $('#id').html(data.id); // setting the values for the html elements
        $('#login').html(data.login);
        $('#name').html(data.name);
        $('#avatar').attr('src',data.avatar_url); //changing the attribute of the element
        $('#url').attr('src',data.html_url);
      });
      });
        </script>
    </head>
    <body>
         <table>
           <thead>
             <td>Id</td>
             <td>Login</td>
             <td>Name</td>
             <td>Avatar</td>
             <td>Url</td>
           </thead>
           <tbody>
             <td id="id"></td>
             <td id="login"></td>
             <td id="name"></td>
             <td><img src="" id="avatar"></td>
             <td><a href="" id="url" target="_blank">Link</a></td>
           </tbody>
         </table>
         <p> <strong>For search</strong> write in url the username of your github account</p>
         <hr>
         <a href="/">Back to home</a>
         <hr>
         <a href="/users/{{$user}}/repos">Go to list repository</a>
    </body>
</html>
