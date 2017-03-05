<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Web application</title>

    <script type="text/javascript">
      window.onload=function(){
        setInterval('loadPage("requestHR.php")',2000);
      }
      function loadPage( page ){
        var x = new XMLHttpRequest();
        x.open("get", page );
        x.onreadystatechange=function(){
          var content=document.getElementById("showcontent");
          content.innerHTML = x.response;
        }
        x.send(null);
      }
    </script>

  </head>
  <body>
    <h1>test Ajax</h1>
    <button id ="btn1" onclick="loadPage('requestHR.php')" type="button" name="button">Monitor</button>
    <button id ="btn2" onclick="loadPage('number.php')" type="button" name="button">Progress</button>
    <div id="showcontent" class=""></div>
  </body>
</html>
