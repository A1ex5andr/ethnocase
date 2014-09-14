<?php
    foreach($_POST as $key => $value)
    {
        $value = trim($value);
        $value = addslashes(htmlspecialchars($value));
        $form[$key] = $value;
    }

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

    if(($form['name'] != '') AND ($form['email'] != '') AND ($form['message']))
		{
			$message = '<html><head><title>ETHNOCASE - Contact</title></head><body>
            <p>Автор: '.$form['name']. '</p>
            <p>Email: '.$form['email']. '</p><br />
			<p>Вам надійшло замовлення:</p>
			<p>'. $form['email'] .'</p>
			</body></html>';

            $message2 = '<html><head><title>ETHNOCASE</title></head><body>
            <p>Thank you, <br>
                we\'ll contact you asap.
            </p>
            <br />
            <br />
            Best regards, <br />
            ETHNOCASE Team
            </body></html>';

			$from = 'From: <info@ethnocase.net>' . "\r\n";

            mailto('info@coderstudio.net', 'CoderStudio', $message, $from);
			mailto($form['email'], 'CoderStudio', $message2,  $from);

            redirect('0', $link, '<!--h2 style="text-align: center; margin-top:100px;"> Thanks for registration!</h2-->', '1');
            exit;
        }
?>		

 