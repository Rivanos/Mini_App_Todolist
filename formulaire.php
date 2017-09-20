<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire de la To Do list</title>
  </head>
  <body>
    <div id="result">
    <?php include 'contenu.php' ?>
    </div>
    <form id="todolist" class="todolist" action="" method="post">
      <label for="list">Tâches à effectuer</label>
      <br />
      <input type="text" name="list" />
      <br />
      <input type="submit" name="" value="Ajouter">
    </form>
  </body>
  <script src="jquery.js"></script>
  <script type="text/javascript" src="js.js"></script>
</html>
