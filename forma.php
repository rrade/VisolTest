<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>VISOL</title>
  </head>
  <body>
    <h1>Create Issue Form</h1>
    <form action="createIssue.php" method="post" class="p-3" enctype="multipart/form-data">
      <div class="form-group">
        <label for="formGroupExampleInput">Ime i prezime</label>
        <input required type="text" class="form-control" id="formGroupExampleInput" name="ime" placeholder="Ime i prezime">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">E mail</label>
        <input type="email" class="form-control" id="formGroupExampleInput2" name="email" placeholder="E mail">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Telefon</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="tel" placeholder="Telefon">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Prioritet</label>
        <select class="form-control" name="prioritet">
          <option  value="Highest">Highest</option>
          <option  value="High">High</option>
          <option selected value="Medium">Medium</option>
          <option  value="Low">Low</option>
          <option  value="Lowest">Lowest</option>
        </select>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Do datuma</label>
        <input type="date" class="form-control" id="formGroupExampleInput2" name="datum" placeholder="Datum">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Fajl</label>
        <input type="file" class="form-control" id="formGroupExampleInput2" name="attachment" placeholder="Fajl">
      </div>
      <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </form>
  </body>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>
