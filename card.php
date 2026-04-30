<?php
declare(strict_types=1);
require_once __DIR__ . '/../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';

$langs->load("immoclient@immoclient");
$id = GETPOST('id', 'int');
$object = new Societe($db);
if ($id > 0) $object->fetch($id);

llxHeader('', 'Fiche client');
print load_fiche_titre('Fiche client : ' . dol_escape_htmltag($object->nom), '', 'company.png');
print '<table class="border centpercent">';
print '<tr><td class="titlefield">Nom</td><td>' . dol_escape_htmltag($object->nom) . '</td></tr>';
print '<tr><td>Email</td><td>' . dol_escape_htmltag($object->email) . '</td></tr>';
print '<tr><td>Telephone</td><td>' . dol_escape_htmltag($object->phone) . '</td></tr>';
print '<tr><td>Adresse</td><td>' . dol_escape_htmltag($object->address) . ', ' . dol_escape_htmltag($object->town) . '</td></tr>';
print '<tr><td>Type</td><td>' . $object->getTypeUrl(2) . '</td></tr>';
print '</table>';
print '<div class="tabsAction">';
print '<a class="butAction" href="' . DOL_URL_ROOT . '/societe/card.php?socid=' . $id . '&action=edit">Modifier dans Dolibarr</a>';
print '<a class="butAction" href="index.php">Retour liste</a>';
print '</div>';
llxFooter();
