<?php

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////



if (!empty($_POST["send"])) {

    $email = $_POST["email"];

    $message = $_POST["message"];

    // Recipient email
    $toMail = "simatovic.lucie@gmail.com";

    // Build email header
    $header = "From: " . $email . ">\r\n";

    // Send email
    if (mail($toMail, $message, $header)) {

        $response = array(
            "status" => "alert-success",
            "message" => "We have received your query and stored your information. We will contact you shortly."
        );
    } else {
        $response = array(
            "status" => "alert-danger",
            "message" => "Message coudn't be sent, try again"
        );
    }
};



// Messge
// if (!empty($response)) { 
// echo  <div class="alert text-center <?php echo $response['status']; " role="alert">
//  echo $response['message']; 
//   </div>
//}


/////////////////////////////////////////////////////////////
// Affichage : inclusion du fichier de template
render('contact', [

    $message = $response['message']
]);
