
<?php 
if(isset($_POST['submit'])){
    $emailN = $_POST['emailN'];
    $emailR = $_POST['emailR'];
    
    $emailTED = "tedx@utexas.edu";
    
    $nameR = $_POST['nameR'];
    $nameN = $_POST['nameN'];
    
    $message = $_POST['message'];
    
    $subjectTED = "Nomination Form Submission: " . $nameN;
    $headersTED = "From:" . $emailR;
    
    $messageTED = "New Nomination ALERT! \n" . "    Nominee: " . $nameN . " - " . $emailN . "\n    Reccommender: " . $nameR . " - " . $emailR . "\n    For Reason: " . $message;
    
    // $messageTED = "Hey TED" . $nameR;
    
    $subjectNOMINEE = "You've been nominated to Apply for TEDxUTAustin!";
    $headersNOMINEE = "From:" . $emailTED;
    
    // $messageNOMINEE = "Hi " . $nameN . "\n\n Someone has put forth your name as a potential speaker at TEDxUTAustin. We encourage you to apply by visiting" . ' <a href="tedxutaustin.com"> ' . 'tedxutaustin.com' . '</a>';

    $headersNOMINEE = "From: " . $emailTED . "\r\n";
    $headersNOMINEE .= "MIME-Version: 1.0" . "\r\n";
    $headersNOMINEE .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    
    $messageNOMINEE = file_get_contents("https://djshanzee.com/shanil_private/form/emailtemplate.html");
    // $messageNOMINEE = "hi " . $nameN;
    
    // TED Notifier
    mail($emailTED,$subjectTED,$messageTED,$headersTED);
    
    // Nominee Notifier 
    mail($emailN,$subjectNOMINEE,$messageNOMINEE,$headersNOMINEE); 
    
    
    // echo "Nomination for " . $nameN . " Received. Thank you " . $nameR . "!";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    
    
   
    //set the data of the CSV
    $data = "$nameR,$emailR,$nameN,$emailN,$message\n";

    # set the file name and create CSV file
    $FileName = "responses.csv";
    
        file_put_contents( $FileName, $data, FILE_APPEND );
    
    
    
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TEDxUTAustin Speaker Nomination Portal">
    <meta name="author" content="TEDxUTAustin">
    <!--<meta name="keywords" content="Colorlib Templates">-->

    <!-- Title Page-->
    <title>Speaker Nomination | TEDxUTAustin</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                     
                     <?php 
                        if(isset($_POST['submit'])){
                            echo '<strong><div class="alert alert-success" role="alert">' . "Nomination for " . $nameN . " Received. Thank you " . $nameR . "!" . "</div></strong><br/><br/>";
                        }
                    ?>
                     
                     <p>Use this portal to nominate a speaker to apply to our platform</p>
                     <br/>
                    <h2 class="title">Nominate a Speaker!</h2>
                   
                    
                    <br/>
                    <form class="needs-validation" novalidation method="POST">
                        
                        <!--recommender -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="text" class="input--style-1 form-control" id="nameR" name="nameR" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input type="email" class="input--style-1 form-control" id="emailR" name="emailR" placeholder="Your email">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!--nominee-->
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="text" class="input--style-1 form-control" id="nameN" name="nameN" placeholder="Who are you Nominating?">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input type="email" class="input--style-1 form-control" id="emailN" name="emailN" placeholder="Nominee email">
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="input-group">
                                <input class="input--style-1 form-control" type="text" placeholder="Why are you nominating this person?" id="message" name="message" >
                            </div>
                        
                        
                        
                    
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name ="submit" type="submit">Submit Nomination</button>
                            <br/>
                            <br/>
                            
                            <!--<input type="submit" name="submit" value="Submit Nomination" class="btn btn--radius btn--green">  -->
                        </div>
                    </form>
                    
                     
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
