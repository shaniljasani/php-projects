<html>
    
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    
    <body style="text-align: center;">
        <div class="container">
            <h1>
            <?php
            
            $date = new DateTime("now", new DateTimeZone('Europe/London'));
            $tz = $date->getTimezone();
            echo  $date->format('h:i a');
            
            ?>
        </h1>
        <h2>Noreen Go to Sleep</h2>
        <br/>
        <h1>
            <?php
            
            $date2 = new DateTime("now", new DateTimeZone('America/Chicago'));
            $tz2 = $date2->getTimezone();
            echo  $date2->format('h:i a');
            
            ?>
        </h1>
        <h2>Daanish - Dayta or Dahta I'll take care of the data!</h2>
        <br/>
        <h1>
            <?php
            
            $date3 = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
            $tz3 = $date3->getTimezone();
            echo  $date->format('h:i a');
            
            ?>
        </h1>
        <h2>Naaila puts the CONNECT in connectivity</h2>
            
        </div>
        
        
    
    </body>
</html>