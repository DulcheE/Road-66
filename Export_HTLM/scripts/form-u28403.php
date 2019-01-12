<?php 
/* 	
If you see this text in your browser, PHP is not configured correctly on this hosting provider. 
Contact your hosting provider regarding PHP configuration for your site.

PHP file generated by Adobe Muse CC 2018.0.0.379
*/

require_once('form_process.php');

$form = array(
	'subject' => 'Envoi de Formulaire Mother-Road',
	'heading' => 'Envoi du nouveau formulaire',
	'success_redirect' => '',
	'resources' => array(
		'checkbox_checked' => 'Coché',
		'checkbox_unchecked' => 'Non coché',
		'submitted_from' => 'Formulaire envoyé depuis le site web :%s',
		'submitted_by' => 'Adresse IP du visiteur :%s',
		'too_many_submissions' => 'Trop d\'envois effectués récemment à partir de cette adresse IP',
		'failed_to_send_email' => 'Echec de l\'envoi du courrier électronique',
		'invalid_reCAPTCHA_private_key' => 'Clé privée reCAPTCHA non valide',
		'invalid_reCAPTCHA2_private_key' => 'Clé privée reCAPTCHA 2.0 non valide.',
		'invalid_reCAPTCHA2_server_response' => 'Réponse du serveur à l\'outil reCAPTCHA 2.0 non valide.',
		'invalid_field_type' => 'Type de champ inconnu « %s »',
		'invalid_form_config' => 'Le champ « %s » a une configuration non valide.',
		'unknown_method' => 'Méthode de requête inconnue du serveur'
	),
	'email' => array(
		'from' => 'marc.dulche@numericable.fr',
		'to' => 'marc.dulche@numericable.fr'
	),
	'fields' => array(
		'Email' => array(
			'order' => 1,
			'type' => 'email',
			'label' => 'Adresse électronique',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Adresse électronique » est obligatoire.',
				'format' => 'Le champ « Adresse électronique » contient une adresse électronique non valide.'
			)
		),
		'custom_U28407' => array(
			'order' => 2,
			'type' => 'string',
			'label' => 'Mot de passe',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Mot de passe » est obligatoire.'
			)
		)
	)
);

process_form($form);
?>
