<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form View</title>
</head>

<body>
    <?php
    //ceheck list
    //check if user is login
    //call necessary files
    include('../controllers/contact_controller.php');

    display_all_contact_fxn();

    ?>




    <form action="../actions/process_save.php" method="POST">
        <input type="text" name="firstName" id="fname">
        <input type="tel" name="tele" id="telnumber" placeholder="Enter your Tel">
        <input type="submit" name="tryME" value="Saving">
    </form>
</body>

</html>