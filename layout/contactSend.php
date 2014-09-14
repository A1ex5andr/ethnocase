<?php
echo "test";
echo $form['contactname'];

function redirect($time, $links, $text, $exit)
    {
        print"<html><head><meta http-equiv=\"refresh\" content=\"".$time."; url=".$links."\"></head>
	        <body>
		        ".$text."<p align=center><a href=\"".$links."\">"."</a><br><br>
	        </body>
        </html>"; 
        if ($exit == '1'){exit;}
    }

function mailto($to,$subject,$message,$from)
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= $from."\r\n";

        mail($to, $subject, $message, $headers);  
    }    

    if( (!empty($form['contact-name']) && (!empty($form['contact-email'])) && (!empty($form['contact-message'])) )
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

			$from = "From: <bars38@gmail.com>\r\n";

            mailto('bars38@gmail.com', 'CoderStudio', $message, $from);
			mailto($form['contact-email'], 'CoderStudio', $message2,  $from);

            redirect('0', $link, '<!--h2 style="text-align: center; margin-top:100px;"> Thanks for registration!</h2-->', '1');
            exit;
        }
?>		

 