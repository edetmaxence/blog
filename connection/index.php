<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Placer sa feuille de style CSS en dernière position ;) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="connectionUser.php" method="post">
<div class="col-6">
    <label for="exampleInputEmail1" class="form-label">first Name</label>
    <input type="text" class="form-control" id="lastanme"  name="firstname">
  </div>
<div class="col-6">
    <label for="exampleInputEmail1" class="form-label">last Name</label>
    <input type="text" class="form-control" id="lastanme"  name="lastname">
  </div>
  <div class="col-6">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name="email">
    
  </div>
  <div class="col-6">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>