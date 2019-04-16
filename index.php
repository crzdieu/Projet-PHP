<?php
$regexFirstname = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$regexPhoneNumber = '#^[0][1-9][0-9]{8}$#';
$regexMail = '#^([\w._-]+@[\w.-_]+[.][a-z]+)$#';
$regexText = '#^([A-Z a-zÀ-ÖØ-öø-ÿ].+)?$#';
$regexCity = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ -]+)$#';
$page = intval($_GET['page']) - 1;
$source = simplexml_load_file('source.xml');
$formErrors = array();
?>

<?php
if (count($_POST) > 0) {

  if (!empty($_POST['your-name'])) {
    if (preg_match($regexFirstname, $_POST['your-name'])) {
      $lastName = htmlspecialchars($_POST['your-name']);
    } else {
      $formErrors['your-name'] = 'Vôtre nom de famille est incorrect';
    }
  } else {
    $formErrors['your-name'] = 'Veuillez renseigner votre nom de famille';
  }

  if (!empty($_POST['your-email'])) {
    if (preg_match($regexMail, $_POST['your-email'])) {
      $email = htmlspecialchars($_POST['your-email']);
    } else {
      $formErrors['your-email'] = 'Vôtre adresse Mail est incorrect';
    }
  }

  if (!empty($_POST['your-tel-615'])) {
    if (preg_match($regexPhoneNumber, $_POST['your-tel-615'])) {
      $phoneNumber = htmlspecialchars($_POST['your-tel-615']);
    } else {
      $formErrors['your-tel-615'] = 'Vôtre numéro est incorrect';
    }
  } else {
    $formErrors['your-tel-615'] = 'Veuillez renseigner votre numéro de téléphone';
  }

  if (!empty($_POST['your-subject'])) {
    if (preg_match($regexText, $_POST['your-subject'])) {
      $subject = htmlspecialchars($_POST['your-subject']);
    } else {
      $formErrors['your-subject'] = 'Vôtre sujet est incorrect';
    }
  }

  if (!empty($_POST['your-ville'])) {
    if (preg_match($regexCity, $_POST['your-ville'])) {
      $phoneNumber = htmlspecialchars($_POST['your-ville']);
    } else {
      $formErrors['your-ville'] = 'Vôtre ville est incorrect';
    }
  }

  if (!empty($_POST['your-message'])) {
    if (preg_match($regexText, $_POST['your-message'])) {
      $message = htmlspecialchars($_POST['your-message']);
    } else {
      $formErrors['your-message'] = 'Vôtre ne correspond pas';
    }
  }
}

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>phpProject</title>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Menu</div>
        <div class="list-group list-group-flush">
          <a href="1.html" class="list-group-item list-group-item-action bg-light">Acceuil</a>
          <a href="2.html" class="list-group-item list-group-item-action bg-light">Qui sommes nous?</a>
          <a href="3.html" class="list-group-item list-group-item-action bg-light">Nos clients témoignent</a>
          <a href="4.html" class="list-group-item list-group-item-action bg-light">Contact</a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <?= $source->page[$page]->content  ?>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>
