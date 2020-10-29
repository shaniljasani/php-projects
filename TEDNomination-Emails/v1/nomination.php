<!--Asking-->

<!--Recommender Name nameR-->
<!--Recommender Email emailR-->

<!--Nominee Name nameN-->
<!--Nominee Email emailN-->

<!--Why message-->

<!--verification-->

<!--submit-->

<?php 
if(isset($_POST['submit']) && $_POST['verification'] == true){
    $emailN = $_POST['emailN'];
    $emailR = $_POST['emailR'];
    
    $emailTED = "shaniljasani@gmail.com";
    
    $nameR = $_POST['nameR'];
    $nameN = $_POST['nameN'];
    
    $message = $_POST['message'];
    
    $subjectTED = "Nomination Form Submission :" . nameN;
    $headersTED = "From:" . $emailR;
    
    // $messageTED = '<html><body>' . '<h1>New Nomination!</h1>' . '<br/> Nominee: ' . $nameN . ' - ' . $emailN . '<br/> Reccommender: ' . $nameR . ' - ' . $emailR . '<br/> For Reason: ' . $message .= '</body></html>';
    
    $messageTED = "Hey TED" . $nameR;
    
    $subjectNOMINEE = "You've been nominated to Apply for TEDxUTAustin!";
    $headersNOMINEE = "From:" . $emailTED;
    
    // $messageNOMINEE = "Hi " . $nameN . "\n\n Someone has put forth your name as a potential speaker at TEDxUTAustin. We encourage you to apply by visiting" . '<a href="tedxutaustin.com">' . tedxutaustin.com . '</a>';

    $messageNOMINEE = "hi " . $nameN;
    
    // TED Notifier
    mail($emailTED,$subjectTED,$messageTED,$headersTED);
    
    // Nominee Notifier 
    mail($emailN,$subjectNOMINEE,$messageNOMINEE,$headersNOMINEE); 
    
    
    echo "Mail Sent. Thank you " . $nameR . "! A message has been sent to " . $nameN . " at " . $emailN;
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Speaker Nomination</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<style>
    .centered{
        text-align: center;
    }
</style>

</head>
<body class="centered">

<form action="" method="post">
Your Name: <input type="text" name="nameR"><br>
Your Email: <input type="text" name="emailR"><br>

Who would you like to nominate? <input type="text" name="nameN"><br>
What is your nominee's email? <input type="text" name="emailN"><br>

Why are you nominating this person? <br><textarea rows="5" name="message" cols="30"></textarea><br>

<!--I affirm that I am nominating this person and agree that an email will be delivered to their inbox upon submission. <input type="checkbox" name="verification">-->
<input type="submit" name="submit" value="Submit">
</form>