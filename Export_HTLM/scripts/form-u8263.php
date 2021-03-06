<?php 
/* 	
If you see this text in your browser, PHP is not configured correctly on this hosting provider. 
Contact your hosting provider regarding PHP configuration for your site.

PHP file generated by Adobe Muse CC 2018.0.0.379
*/

require_once('form_process.php');

$form = array(
	'subject' => 'Envoi de Formulaire Modifier mon compte',
	'heading' => 'Envoi du nouveau formulaire',
	'success_redirect' => 'confirmation-d-inscription.html',
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
		'from' => 'Motherroad@outlook.fr',
		'to' => 'Motherroad@outlook.fr'
	),
	'fields' => array(
		'custom_U8311' => array(
			'order' => 3,
			'type' => 'string',
			'label' => 'Nom',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Nom » est obligatoire.'
			)
		),
		'Email' => array(
			'order' => 6,
			'type' => 'email',
			'label' => 'Adresse électronique',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Adresse électronique » est obligatoire.',
				'format' => 'Le champ « Adresse électronique » contient une adresse électronique non valide.'
			)
		),
		'custom_U8316' => array(
			'order' => 1,
			'type' => 'string',
			'label' => 'Prénom',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Prénom » est obligatoire.'
			)
		),
		'custom_U8264' => array(
			'order' => 4,
			'type' => 'string',
			'label' => 'Adresse perso',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Adresse perso » est obligatoire.'
			)
		),
		'custom_U8320' => array(
			'order' => 10,
			'type' => 'string',
			'label' => 'Ville',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Ville » est obligatoire.'
			)
		),
		'custom_U8280' => array(
			'order' => 7,
			'type' => 'string',
			'label' => 'Code postal',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Code postal » est obligatoire.'
			)
		),
		'custom_U8304' => array(
			'order' => 9,
			'type' => 'string',
			'label' => 'Pays',
			'required' => true,
			'errors' => array(
				'required' => 'Le champ « Pays » est obligatoire.'
			)
		),
		'custom_U8288' => array(
			'order' => 8,
			'type' => 'string',
			'label' => 'Adresse électronique du deuxième participant',
			'required' => false,
			'errors' => array(
			)
		),
		'custom_U8268' => array(
			'order' => 5,
			'type' => 'checkboxgroup',
			'label' => 'Vous participer à l\'aventure',
			'required' => false,
			'optionItems' => array(
				'Seul',
				'Avec votre conjoint',
				'Avec un(e) ami(e)'
			),
			'errors' => array(
				'format' => 'Le champ « Vous participer à l\'aventure » contient une valeur non valide.'
			)
		),
		'custom_U8292' => array(
			'order' => 2,
			'type' => 'checkboxgroup',
			'label' => 'Vous êtes la pour',
			'required' => true,
			'optionItems' => array(
				'Juste nous suivre',
				'Participer à l\'aventure depuis Chicago',
				'Participer à l\'aventure depuis le Texas'
			),
			'errors' => array(
				'required' => 'Le champ « Vous êtes la pour » est obligatoire.',
				'format' => 'Le champ « Vous êtes la pour » contient une valeur non valide.'
			)
		)
	)
);

process_form($form);
?>
