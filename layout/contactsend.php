<?php if ( !defined('MITH') ) {exit;} ?>
<?php

    if( (!empty($form['contact-name'])) && (!empty($form['contact-email'])) && (!empty($form['contact-message'])) )
        {
            $message = '<html><head><title>ETHNOCASE - Contact</title></head><body>
            <p>Автор: '.$form['contact-name']. '</p>
            <p>Email: '.$form['contact-email']. '</p><br />
            <p>Вам надійшло замовлення:</p>
            <p>'. $form['contact-message'] .'</p>
            </body></html>';

            $message2 = "<html><head><title>ETHNOCASE</title></head><body>
            <p>Thank you, <br>
                we'll contact you asap.
            </p>
            <br />
            <br />
            Best regards, <br />
            ETHNOCASE Team
            </body></html>";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: bars38@gmail.com' . "\r\n" .
    'Reply-To: bars38@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

        mail($form['contact-email'], 'CoderStudio', $message, $headers);
        mail('info@ethnocase.com', 'CoderStudio', $message2, $headers);


require_once("layout/head.php");
require_once("layout/header.php");
?>
        <div class="slogan container">
            <h1><?php echo $texts['thankyoumail']; ?></h1>
        </div>
    </body>
</html>

<?php 

           exit;
        }
?>      

 