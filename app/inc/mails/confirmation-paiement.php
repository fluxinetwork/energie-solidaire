<?php
$footer_mail =
$montant =
$nom_structure_contact =
$adresse =
$complement_adresse =
$code_postal =
$ville =
$date_paiement =
$num_mode_paiement =
$mode_paiement = '';

if ( $vars ) :   
    $footer_mail = $vars[0];
    $montant = $vars[1];
    $nom_structure_contact = $vars[2];
    $adresse = $vars[3];
    $complement_adresse = $vars[4];
    $code_postal = $vars[5];
    $ville = $vars[6];
    $date_paiement = $vars[7];
    $num_mode_paiement = $vars[8];
    $mode_paiement = $vars[9];
    $nom_contact = $vars[10];
    $prenom_contact = $vars[11];
endif;

if($mode_paiement=='cb'):
  $infos_paiement = 'par carte bancaire n°'.$num_mode_paiement;
else:
  $infos_paiement = 'par chéque n°'.$num_mode_paiement;
endif;


$contenu_mail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Les Amis d\'Enercoop - Confimation de paiement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#ffffff" style="margin:0;">
    <table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>         
            <p>            
              Paris, le '.$date_paiement.'<br><br>

              Destinataire :<br>
              '.$prenom_contact.' '.$nom_contact.'<br>
              '.$nom_structure_contact.'<br>
              '.$adresse.' '.$complement_adresse.'<br>
              '.$code_postal.', '.$ville.'
            </p>
           </td>
        </tr>

        <tr>
          <td>
            <h4>Votre don a bien été enregistré</h4>
            <p>Énergie Solidaire vous remercie. Vous recevrez prochainement un reçu fiscal.</p>           
          </td>
        </tr>

        <tr>
          <td>
            <p style="border:2px solid #000; padding:15px;">         

              Acquitté le '.$date_paiement.' '.$infos_paiement.'. <br><br>

              Montant du don : '.$montant.',00 €
            </p>
          </td>
        </tr>       

        <tr>
          <td>
            '.$footer_mail.'
          </td>
        </tr> 

    </table>
</body>
</html>';
?>