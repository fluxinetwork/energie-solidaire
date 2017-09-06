<?php

/* | CUSTOM FUNCTIONS - V1.0 - 00/00/00 | 
-------------------------------------------------------
   | get_footer_mail()
*/

/**
 * Get email footer
 *
 * @param   N/A
 *
 * @return	string - The generic mail footer
 */

function get_footer_mail(){
	$footer_mail = 'Bien cordialement,<br>
	Les Amis d\'Enercoop<br><br>

	10 rue Riquet<br>
	75019 Paris<br>
	Association loi 1901 • SIRET : 518 702 329 00039<br><br>

	Tél : 01 80 48 16 24<br>
	Mail : contact@lesamisdenrcoop.org<br>	
	<a href="http://www.lesamisdenercoop.org" target="_blank">www.lesamisdenercoop.org</a>';

	 // return footer mail
    return $footer_mail;
}