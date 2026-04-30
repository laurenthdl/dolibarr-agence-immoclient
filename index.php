<?php
declare(strict_types=1);
require_once __DIR__ . '/../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';

$langs->load("immoclient@immoclient");
llxHeader('', 'Clients immobiliers');
print load_fiche_titre('Clients immobiliers', '', 'company.png');
print '<div class="tabsAction"><a class="butAction" href="' . DOL_URL_ROOT . '/societe/card.php?action=create&type=t">Nouveau client</a></div><br>';

$sql = "SELECT s.rowid, s.nom, s.email, s.phone, s.town FROM " . $db->prefix() . "societe s WHERE s.client IN (1,2,3) ORDER BY s.nom";
$resql = $db->query($sql);
print '<table class="noborder centpercent liste"><tr class="liste_titre"><th>Nom</th><th>Email</th><th>Telephone</th><th>Ville</th><th class="center">Actions</th></tr>';
if ($resql) {
    while ($obj = $db->fetch_object($resql)) {
        print '<tr class="oddeven">';
        print '<td><a href="card.php?id=' . $obj->rowid . '">' . dol_escape_htmltag($obj->nom) . '</a></td>';
        print '<td>' . dol_escape_htmltag($obj->email) . '</td>';
        print '<td>' . dol_escape_htmltag($obj->phone) . '</td>';
        print '<td>' . dol_escape_htmltag($obj->town) . '</td>';
        print '<td class="center"><a href="card.php?id=' . $obj->rowid . '">' . img_picto('Voir', 'view') . '</a></td>';
        print '</tr>';
    }
}
print '</table>';
llxFooter();
