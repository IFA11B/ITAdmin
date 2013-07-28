<?php
//define table names for DB
define('DB_KOMPONENT2KOMPONENT', 'komponente_hat_komponente');
define('DB_MODULE', 'module');
define('DB_USER_PRIVILEGES', 'benutzer_rechte');
define('DB_USER', 'benutzer');
define('DB_SUPPLIER', 'lieferant');
define('DB_KOMPONENT', 'komponenten');
define('DB_ROOM', 'raeume');
define('DB_TBL_PC', 'pckomplett');

// define management information attributes for DB
define ('DB_MANAGE_VALID', 'vwi_valid');
define ('DB_MANAGE_CREATED', 'vwi_created');
define ('DB_MANAGE_LASTUPDATED', 'vwi_lastupdated');

// define user attributes for DB
define('DB_USER_ID', 'pk_ben_id');
define('DB_USER_NAME', 'ben_name');
define('DB_USER_PWD', 'ben_pwdhash');
define('DB_USER_CREATE_DATE', 'ben_erstellungsdatum');

// define user privileges attributes for DB
define('DB_USER_PRIV_ID', 'pk_bpk_r_id');
define('DB_USER_PRIV_USER', 'fk_benutzepk_r_id');
define('DB_USER_PRIV_MODULE', 'fk_modupk_l_id');
define('DB_USER_PRIV_READ', 'br_read');
define('DB_USER_PRIV_WRITE', 'br_write');

// define supplier attributes for DB
define ('DB_SUPPLIER_ID', 'pk_l_id');
define ('DB_SUPPLIER_COMPANYNAME', 'l_firmenname');
define ('DB_SUPPLIER_STREET', 'l_strasse');
define ('DB_SUPPLIER_ZIPCODE', 'l_plz');
define ('DB_SUPPLIER_CITY', 'l_ort');
define ('DB_SUPPLIER_PHONE', 'l_tel');
define ('DB_SUPPLIER_MOBILE', 'l_mobil');
define ('DB_SUPPLIER_FAX', 'l_fax');
define ('DB_SUPPLIER_EMAIL', 'l_email');

// define room attributes for DB
define ('DB_ROOM_ID', 'pk_r_id');
define ('DB_ROOM_NUMBER', 'r_nr');
define ('DB_ROOM_NAME', 'r_bezeichnung');
define ('DB_ROOM_NOTE', 'r_notiz');

// define component attributes for DB
define ('DB_COMPONENT_ID', 'pk_k_id');
define ('DB_COMPONENT_SUPPLIER', 'fk_l_k_lieferid');
define ('DB_COMPONENT_ROOM', 'fk_r_komp_kompraum');
define ('DB_COMPONENT_PURCHASE_DATE', 'k_einkaufsdatum');
define ('DB_COMPONENT_WARRANTY_PERIOD', 'k_gewaehrleistungsdauer');
define ('DB_COMPONENT_NOTICE', 'k_notiz');
define ('DB_COMPONENT_MANUFACTURER', 'k_hersteller');

// define module attributes for DB
define ('DB_MODULE_ID', 'pk_mod_id');
define ('DB_MODULE_NAME', 'mod_name');

// define subcomponent attributes for DB
define ('DB_SUBCOMPONENT_AGGREGAT', 'pk_komponenten_pk_k_id_aggregat');
define ('DB_SUBCOMPONENT_UNIT', 'pk_komponenten_pk_k_id_teil');
define ('DB_SUBCOMPONENT_ID', 'pk_khpk_k_id');
define ('DB_SUBCOMPONENT_ACTION', 'vorgangsarten_pk_v_id');
define ('DB_SUBCOMPONENT_DATE', 'khk_datum');

// define component_types attributes for DB
define ('DB_COMPONENT_TYPE', 'ka_komponentenart');
define ('DB_COMPONENT_TYPE_ACCESS_POINT', 'accesspoints');
define ('DB_COMPONENT_TYPE_COMPUTER', 'pckomplett');
define ('DB_COMPONENT_TYPE_CPU', 'cpu');
define ('DB_COMPONENT_TYPE_ODD', 'optische_laufwerke');
define ('DB_COMPONENT_TYPE_GRAPHICS_CARD', 'grafikkarten');
define ('DB_COMPONENT_TYPE_HARD_DRIVE', 'festplatten');
define ('DB_COMPONENT_TYPE_HUB', 'hub');
define ('DB_COMPONENT_TYPE_MAINBOARD', 'mainboards');
define ('DB_COMPONENT_TYPE_NETWORK_CARD', 'netzwerkkarten');
define ('DB_COMPONENT_TYPE_POWER_SUPPLY', 'netzteile');
define ('DB_COMPONENT_TYPE_PRINTER', 'drucker');
define ('DB_COMPONENT_TYPE_RAID_CONTROLLER', 'raidcontroller');
define ('DB_COMPONENT_TYPE_RAM', 'ram');
define ('DB_COMPONENT_TYPE_ROUTER', 'router');
define ('DB_COMPONENT_TYPE_SOFTWARE', 'software');
define ('DB_COMPONENT_TYPE_SWITCH_COMPONENT', 'switches');
define ('DB_COMPONENT_TYPE_VLAN', 'vlan');

// define Access Point attributes for DB
define ('DB_COMPONENT_AP_IP', 'ap_ip');
define ('DB_COMPONENT_AP_CONFIGFILE', 'ap_konfigdatei');
define ('DB_COMPONENT_AP_NAME', 'ap_name');

// define PC attributes for DB
define ('DB_COMPONENT_PC_ID', 'pk_pc_id');
define ('DB_COMPONENT_PC_IP', 'pc_ip');
define ('DB_COMPONENT_PC_SUBNET', 'pc_subnetzklasse');
define ('DB_COMPONENT_PC_GATEWAY', 'pc_gateway');
define ('DB_COMPONENT_PC_NAME', 'pc_pcname');

// define CPU attributes for DB
define ('DB_COMPONENT_CPU_ID', 'pk_cpu_id');
define ('DB_COMPONENT_CPU_NAME', 'cpu_name');
define ('DB_COMPONENT_CPU_SOCKEL', 'cpu_sockel');

// define disk controller attributes for DB
define ('DB_COMPONENT_DC_ID', 'pk_ka_id');
define ('DB_COMPONENT_DC_DISKTYPE', 'ka_komponentenart');

// define graphics Card attributes for DB
define ('DB_COMPONENT_GC_ID', 'pk_gk_id');
define ('DB_COMPONENT_GC_NAME', 'gk_name');
define ('DB_COMPONENT_GC_INTERFACETYPE', 'gk_interneschnittstelle');
define ('DB_COMPONENT_GC_SPACEMBYTE', 'gk_speicher');
define ('DB_CPMPONENT_GC_NAME', 'gk_name');

// define hard drive attributes for DB
define ('DB_COMPONENT_HDD_ID', 'pk_fp_id');
define ('DB_COMPONENT_HDD_NAME', 'fp_name');
define ('DB_COMPONENT_HDD_INTERFACETYPE', 'fp_schnittstellenart');
define ('DB_COMPONENT_HDD_PURPOSE', 'fp_einsatzzweck');
define ('DB_COMPONENT_HDD_SPACEMBYTE', 'fp_groesse');
define ('DB_COMPONENT_HDD_DRIVETYPE', 'fp_speicherart');

// define HUB attributes for DB
define ('DB_COMPONENT_HUB_ID', 'pk_hub_id');
define ('DB_COMPONENT_HUB_NAME', 'hub_name');
define ('DB_COMPONENT_HUB_PORTSCOUNT', 'hub_anzahlport');
define ('DB_COMPONENT_HUB_SPEEDMBIT', 'hub_geschwindigkeit');

// define mainboard attributes for DB
define ('DB_COMPONENT_MB_ID', 'pk_mb_id');
define ('DB_COMPONENT_MB_NAME', 'mb_name');
define ('DB_COMPONENT_MB_SOCKEL', 'mb_sockel');
define ('DB_COMPONENT_MB_RAMTYPE', 'mb_ramtyp');
define ('DB_COMPONENT_MB_RAMMAXSPACE', 'mb_rammax');
define ('DB_COMPONENT_MB_RAMSLOTSCOUNT', 'mb_bankanzahl');
define ('DB_COMPONENT_MB_CONNECTORTYPEPOWERSUPPLY', 'mb_netzteilsteckertyp');
define ('DB_COMPONENT_MB_CONNECTORTYPECPU', 'mb_cpusteckertyp');
define ('DB_COMPONENT_MB_ONBOARD', 'mb_onboardfunktion');
define ('DB_COMPONENT_MB_INTERFACESINTERN', 'mb_internschnittstelle');
define ('DB_COMPONENT_MB_INTERFACESEXTERN', 'mb_externschnittstelle');

// define network card attributes for DB
define ('DB_COMPONENT_NC_ID', 'pk_nk_id');
define ('DB_COMPONENT_NC_NAME', 'nk_name');
define ('DB_COMPONENT_NC_SPEEDMBIT', 'nk_bandbreitegeschwindigkeit');
define ('DB_COMPONENT_NC_INTERFACEINTERN', 'nk_internschnittstelle');
define ('DB_COMPONENT_NC_INTERFACEEXTERN', 'nk_externschnittstelle');
define ('DB_COMPONENT_NC_PORTSCOUNT', 'nk_anzahlexternports');

// define printer attributes for DB
define ('DB_COMPONENT_P_ID', 'pk_dr_id');
define ('DB_COMPONENT_P_IP', 'dr_ip');
define ('DB_COMPONENT_P_PRINTERTYPE', 'dr_typ');
define ('DB_COMPONENT_P_COLORMODE', 'dr_druckerart');
define ('DB_COMPONENT_P_CONNECTIONTYPE', 'dr_anschlussart');

// define raid controller attributes for DB
define ('DB_COMPONENT_RC_ID', 'pk_rc_id');
define ('DB_COMPONENT_RC_NAME', 'rc_name');
define ('DB_COMPONENT_RC_RAIDLEVEL', 'rc_raidlvl');

// define RAM attributes for DB
define ('DB_COMPONENT_RAM_ID', 'pk_ram_id');
define ('DB_COMPONENT_RAM_SPACEMBYTE', 'ram_groesse');
define ('DB_COMPONENT_RAM_CLOCKSPEEDMHZ', 'ram_taktfrequenz');
define ('DB_COMPONENT_RAM_NAME', 'ram_name');

// define router attributes for DB
define ('DB_COMPONENT_R_ID', 'pk_rout_id');
define ('DB_COMPONENT_R_NAME', 'rout_name');
define ('DB_COMPONENT_R_IPCONFIG1', 'rout_ip1');
define ('DB_COMPONENT_R_IPCONFIG2', 'rout_ip2');
define ('DB_COMPONENT_R_IPCONFIG3', 'rout_ip3');
define ('DB_COMPONENT_R_IPCONFIG4', 'rout_ip4');
define ('DB_COMPONENT_R_CONFIGFILE', 'rout_konfigdatei');

// define software attributes for DB
define ('DB_COMPONENT_S_ID', 'pk_sw_id');
define ('DB_COMPONENT_S_NAME', 'sw_name');
define ('DB_COMPONENT_S_VERSION', 'sw_versionnummer');
define ('DB_COMPONENT_S_LICENSETYPE', 'sw_lizenztyp');
define ('DB_COMPONENT_S_LICENSECOUNT', 'sw_lizenzanzahl');
define ('DB_COMPONENT_S_LICENSEDURATION', 'sw_lizenzlaufzeit');
define ('DB_COMPONENT_S_LICENSEINFORMATION', 'sw_lizenzinformationen');
define ('DB_COMPONENT_S_INSTALLHINT', 'sw_installationshinweis');

// define switch attributes for DB
define ('DB_COMPONENT_SC_ID', 'pk_s_id');
define ('DB_COMPONENT_SC_NAME', 's_name');
define ('DB_COMPONENT_SC_IP', 's_ip');
define ('DB_COMPONENT_SC_PORTSCOUNT', 's_anzahlports');
define ('DB_COMPONENT_SC_UPLINKTYPE', 's_uplinktyp');
define ('DB_COMPONENT_SC_SPEEDMBIT', 's_geschwindigkeit');
define ('DB_COMPONENT_SC_CONFIGFILE', 's_konfigdateipfad');

// define VLAN attributes for DB
define ('DB_COMPONENT_VLAN_TAG', 'vlan_id');
define ('DB_COMPONENT_VLAN_PORT', 'vlan_port');
define ('DB_COMPONENT_VLAN_NAME', 'vlan_name');
define ('DB_COMPONENT_VLAN_ID', 'pk_vlan_id');

define('DB_COMPONENT_ATTRIBUTE_TO_COMPONENT_ENTITY', 'pk_komponentenattribute_pk_kat_id');


// define subcomponent attributes for DB
define ('DB_COMPONENT_CHILDS_ID', 'pk_khpk_k_id');
define ('DB_COMPONENT_PARENT_ID', 'pk_komponenten_ok_k_id_aggregat');

// define optical disk drive for DB
define ('DB_COMPONENT_ODD_ID', 'pk_ol_id');

// define Power Supply for DB
define ('DB_COMPONENT_PS_COUNT', 'nt_anzahlanschluss');
define ('DB_COMPONENT_PS_CPUTYPE', 'nt_cpusteckertyp');
define ('DB_COMPONENT_PS_POWER', 'nt_leistung');
define ('DB_COMPONENT_PS_MAINBOARDTYPE', 'nt_mainboardsteckertyp');

?>