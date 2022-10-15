<?
session_start();
if($_SESSION["newsession"]!="auth"){
header("HTTP/1.1 403 Not Found");
  return false;
}

include("data.php");

//var_dump($data);
//echo $data["config"]["title"];
?>
<!DOCTYPE HTML>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>JSON CMS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <meta name="theme-color" content="#712cf9">


    <style type="text/css" media="screen">
       .ace_editor{
          height: 600px;
        }
    </style>



    <!-- Custom styles for this template -->
 </head>
  <body class="d-flex flex-column h-100">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/admin.php">JSON CMS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="/logout.php">Выход</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <?foreach ($data as $i=>$value) {?>


          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin.php?m=<?=$i?>">
            <?=$value["name"]?>
            </a>
          </li>
        <?  }?>
        </ul>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <?if($_GET["m"]){?>
      <h4 class="pt-2"><?=$data[$_GET["m"]]["name"]?></h4>
      <small class="text-secondary"><em><?=$data[$_GET["m"]]["info"]?></em></small>
      <form action="save.php" method="post" class="mt-3">
          <input type="hidden" name="file" value="<?=$_GET["m"]?>" />
     <textarea name="code"><?
       $homepage = file_get_contents('json/'.$_GET["m"].'.json');
       echo $homepage;?>
     </textarea>
    <div id="editor"></div>
     <div class="col-auto">
   <input  type="submit" class="btn btn-primary mt-3"></input>
 </div>
   </form>
  <?}else{?>
    <h4 class="pt-2">JSON CMS</h4>
    <small class="text-secondary"><em>Панель управления сайтом</em></small>
    <p class="py-3">Простая панель управления лендингом. <br/>Для работы не нужна база данных, все данные храняться структурированно в JSON формате.</p>
  <?}?>



    </main>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.12.0/ace.js" referrerpolicy="origin"></script>
<?if($_GET["m"]){?>
<script>
    var editor = ace.edit("editor");
    var textarea = $('textarea[name="code"]').hide();
    editor.getSession().setValue(textarea.val());
    editor.getSession().on('change', function(){
    textarea.val(editor.getSession().getValue());
});

    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");
</script>
  <?}?>


  <footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">  <a href="https://vk.com/nevoliashka" target="_blank">By Alexandr Plyusnin</a></span>
  </div>
</footer>

</body>
</html>
