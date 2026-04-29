<?php

declare(strict_types=1);

require_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';
require_once DOL_DOCUMENT_ROOT . '/custom/immocore/core/modules/modimmocore.class.php';

class modImmoclient extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs, $conf;

        $this->db = $db;
        $this->numero = 700002;
        $this->rights_class = 'immoclient';
        $this->family = "other";
        $this->module_position = '90';
        $this->name = preg_replace('/^mod/i', '', get_class($this));
        $this->description = "CRM immobilier et visites";
        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->name);
        $this->picto = 'company';
        $this->module_parts = array();
        $this->dirs = array();
        $this->config_page_url = array("immoclient@immobilier");
        $this->depends = array('mod_immocore' => 1, 'mod_societe' => 1);
        $this->requiredby = array();
        $this->conflictwith = array();
        $this->langfiles = array("immoclient@immobilier");
        $this->phpmin = array(8, 1);
        $this->need_dolibarr_version = array(23, 0);
        $this->warnings_activation = array();
        $this->warnings_activation_ext = array();

        $this->const = array();
        $this->tabs = array();
        $this->dictionaries = array();

        $this->menu = array();
        $r = 0;
        $this->menu[$r] = array(
            'fk_menu' => 'fk_mainmenu=immobilier',
            'type' => 'top',
            'titre' => 'Immobilier - Clients',
            'mainmenu' => 'immobilier',
            'leftmenu' => 'immoclient',
            'url' => '/custom/immoclient/index.php',
            'langs' => 'immoclient@immobilier',
            'position' => 700002,
            'perms' => '1',
            'target' => '',
            'user' => 2,
        );
        $r++;

        $this->rights = array();
        $this->rights_class = 'immoclient';
        $r = 0;
        $this->rights[$r][0] = 700002001;
        $this->rights[$r][1] = 'Lire les Immobilier - Clients';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'read';
        $r++;
        $this->rights[$r][0] = 700002002;
        $this->rights[$r][1] = 'Créer/Modifier les Immobilier - Clients';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'write';
        $r++;
        $this->rights[$r][0] = 700002003;
        $this->rights[$r][1] = 'Supprimer les Immobilier - Clients';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'delete';
    }

    public function init($options = ''): int
    {
        return $this->_init($sql, $options);
    }

    public function remove($options = ''): int
    {
        $sql = array();
        return $this->_remove($sql, $options);
    }
}
