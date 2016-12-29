<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

/**
* All language files should use UTF-8 as their encoding
* and the files must not contain a BOM.
*/

/**
* CONTINENT NAME TRANSLATION
*
* Continent names come with 2 types:
*	Default: 			international name, almost in English (Set in ACP)
*	Translation name:	name in your native language (Set below)
*
* Set empty for using the original name from database.
*/
$lang = array_merge($lang, array(
	'CONTINENT_NAMES'	=> array(
		'AF'	=> '',// Africa
		'AQ'	=> '',// Antarctica
		'AS'	=> '',// Asia
		'EU'	=> '',// Europe
		'NA'	=> '',// North America
		'OC'	=> '',// Oceania
		'SA'	=> '',// South America
	),

	/**
	* Config
	*
	* Enable or disable using various forms of the continent name
	* If your language do not use them, set false
	* If disabled, in context, the form will be replaced by continent name (original or translation: depends on the setting in ACP)
	* If enabled but CONTINENT_NAMES_CONFIG array is empty (below), default data in English will be used
	*/
	'CONTINENT_NAMES_CONFIG'	=> array(
		'person'	=> true,// Shows the name of a person from that continent, ex: He is an Asian
		'people'	=> true,// Shows the name of people from that continent, ex: They are Asians
		'adj'		=> true,// Contains the word used to describe something from that continent, ex: He loves an Asian girl
	),

	/**
	* Demonyms
	*
	* If you want to translate various forms of continent names into your language, set here with continent code (quick see in CONTINENT_NAMES)
	* Default data from database is English
	*
	* person	Singular noun (a person)
	* people 	Plural noun (people, ethnic group)
	* adj		Adjective (demonym, language, culture...)
	*/
	'CONTINENT_NAMES_FORMS'	=> array(
		/* Example: ## is two-letters of continent code
		'##'	=> array(
			'person'	=> '',
			'people'	=> '',
			'adj'		=> '',
		),
		*/
	),
));

/**
* COUNTRY NAME TRANSLATION
*
* Country names come with 3 types:
*	Default: 			international name, almost in English (Set in ACP)
*	Local name:			name in the official language/script of each country (Set in ACP)
*	Translation name:	name in your native language (Set below)
*
* Example: Germany, local name is 'Deutschland' and in Vietnamese is 'Đức'
*
* Do not translate all of country names, if nobody known these translation names. Just popular and necessary names.
* Set empty for using the original name from database.
*/
$lang = array_merge($lang, array(
	'COUNTRY_NAMES'	=> array(
		'AB'	=> '',// Abkhazia
		'AD'	=> '',// Andorra
		'AE'	=> '',// United Arab Emirates
		'AF'	=> '',// Afghanistan
		'AG'	=> '',// Antigua and Barbuda
		'AI'	=> '',// Anguilla
		'AL'	=> '',// Albania
		'AM'	=> '',// Armenia
		'AO'	=> '',// Angola
		'AQ'	=> '',// Antarctica
		'AR'	=> '',// Argentina
		'AS'	=> '',// American Samoa
		'AT'	=> '',// Austria
		'AU'	=> '',// Australia
		'AW'	=> '',// Aruba
		'AX'	=> '',// Aland
		'AZ'	=> '',// Azerbaijan
		'BA'	=> '',// Bosnia and Herzegovina
		'BB'	=> '',// Barbados
		'BD'	=> '',// Bangladesh
		'BE'	=> '',// Belgium
		'BF'	=> '',// Burkina Faso
		'BG'	=> '',// Bulgaria
		'BH'	=> '',// Bahrain
		'BI'	=> '',// Burundi
		'BJ'	=> '',// Benin
		'BL'	=> '',// Saint Barthelemy
		'BM'	=> '',// Bermuda
		'BN'	=> '',// Brunei
		'BO'	=> '',// Bolivia
		'BQ'	=> '',// Bonaire, Sint Eustatius and Saba
		'BR'	=> '',// Brazil
		'BS'	=> '',// Bahamas
		'BT'	=> '',// Bhutan
		'BV'	=> '',// Bouvet
		'BW'	=> '',// Botswana
		'BY'	=> '',// Belarus
		'BZ'	=> '',// Belize
		'CA'	=> '',// Canada
		'CC'	=> '',// Cocos Keeling
		'CD'	=> '',// DR Congo
		'CF'	=> '',// Central Africa
		'CG'	=> '',// Congo
		'CH'	=> '',// Switzerland
		'CI'	=> '',// Ivory Coast
		'CK'	=> '',// Cook
		'CL'	=> '',// Chile
		'CM'	=> '',// Cameroon
		'CN'	=> '',// China
		'CO'	=> '',// Colombia
		'CR'	=> '',// Costa Rica
		'CT'	=> '',// Northern Cyprus
		'CU'	=> '',// Cuba
		'CV'	=> '',// Cabo Verde
		'CW'	=> '',// Curacao
		'CX'	=> '',// Christmas
		'CY'	=> '',// Cyprus
		'CZ'	=> '',// Czech
		'DE'	=> '',// Germany
		'DJ'	=> '',// Djibouti
		'DK'	=> '',// Denmark
		'DM'	=> '',// Dominica
		'DN'	=> '',// Donetsk
		'DO'	=> '',// Dominican Republic
		'DZ'	=> '',// Algeria
		'EC'	=> '',// Ecuador
		'EE'	=> '',// Estonia
		'EG'	=> '',// Egypt
		'EH'	=> '',// Western Sahara
		'ER'	=> '',// Eritrea
		'ES'	=> '',// Spain
		'ET'	=> '',// Ethiopia
		'FI'	=> '',// Finland
		'FJ'	=> '',// Fiji
		'FK'	=> '',// Falkland
		'FM'	=> '',// Micronesia
		'FO'	=> '',// Faroe
		'FR'	=> '',// France
		'GA'	=> '',// Gabon
		'GD'	=> '',// Grenada
		'GE'	=> '',// Georgia
		'GF'	=> '',// French Guiana
		'GG'	=> '',// Guernsey
		'GH'	=> '',// Ghana
		'GI'	=> '',// Gibraltar
		'GL'	=> '',// Greenland
		'GM'	=> '',// Gambia
		'GN'	=> '',// Guinea
		'GP'	=> '',// Guadeloupe
		'GQ'	=> '',// Equatorial Guinea
		'GR'	=> '',// Greece
		'GS'	=> '',// South Georgia and South Sandwich
		'GT'	=> '',// Guatemala
		'GU'	=> '',// Guam
		'GW'	=> '',// Guinea-Bissau
		'GY'	=> '',// Guyana
		'HK'	=> '',// Hong Kong
		'HM'	=> '',// Heard and McDonald
		'HN'	=> '',// Honduras
		'HR'	=> '',// Croatia
		'HT'	=> '',// Haiti
		'HU'	=> '',// Hungary
		'ID'	=> '',// Indonesia
		'IE'	=> '',// Ireland
		'IL'	=> '',// Israel
		'IM'	=> '',// Man
		'IN'	=> '',// India
		'IO'	=> '',// British Indian Ocean Territory
		'IQ'	=> '',// Iraq
		'IR'	=> '',// Iran
		'IS'	=> '',// Iceland
		'IT'	=> '',// Italy
		'JE'	=> '',// Jersey
		'JM'	=> '',// Jamaica
		'JO'	=> '',// Jordan
		'JP'	=> '',// Japan
		'JS'	=> '',// Somaliland
		'KE'	=> '',// Kenya
		'KG'	=> '',// Kyrgyzstan
		'KH'	=> '',// Cambodia
		'KI'	=> '',// Kiribati
		'KM'	=> '',// Comoros
		'KN'	=> '',// Saint Kitts and Nevis
		'KO'	=> '',// Kosovo
		'KP'	=> '',// North Korea
		'KR'	=> '',// South Korea
		'KU'	=> '',// Kurdistan
		'KW'	=> '',// Kuwait
		'KY'	=> '',// Cayman
		'KZ'	=> '',// Kazakhstan
		'LA'	=> '',// Laos
		'LB'	=> '',// Lebanon
		'LC'	=> '',// Saint Lucia
		'LH'	=> '',// Luhansk
		'LI'	=> '',// Liechtenstein
		'LK'	=> '',// Sri Lanka
		'LR'	=> '',// Liberia
		'LS'	=> '',// Lesotho
		'LT'	=> '',// Lithuania
		'LU'	=> '',// Luxembourg
		'LV'	=> '',// Latvia
		'LY'	=> '',// Libya
		'MA'	=> '',// Morocco
		'MC'	=> '',// Monaco
		'MD'	=> '',// Moldova
		'ME'	=> '',// Montenegro
		'MF'	=> '',// Saint Martin
		'MG'	=> '',// Madagascar
		'MH'	=> '',// Marshall
		'MK'	=> '',// Macedonia
		'ML'	=> '',// Mali
		'MM'	=> '',// Myanmar
		'MN'	=> '',// Mongolia
		'MO'	=> '',// Macao
		'MP'	=> '',// Northern Mariana
		'MQ'	=> '',// Martinique
		'MR'	=> '',// Mauritania
		'MS'	=> '',// Montserrat
		'MT'	=> '',// Malta
		'MU'	=> '',// Mauritius
		'MV'	=> '',// Maldives
		'MW'	=> '',// Malawi
		'MX'	=> '',// Mexico
		'MY'	=> '',// Malaysia
		'MZ'	=> '',// Mozambique
		'NA'	=> '',// Namibia
		'NC'	=> '',// New Caledonia
		'NE'	=> '',// Niger
		'NF'	=> '',// Norfolk
		'NG'	=> '',// Nigeria
		'NI'	=> '',// Nicaragua
		'NK'	=> '',// Nagorno-Karabakh
		'NL'	=> '',// Netherlands
		'NO'	=> '',// Norway
		'NP'	=> '',// Nepal
		'NR'	=> '',// Nauru
		'NU'	=> '',// Niue
		'NZ'	=> '',// New Zealand
		'OM'	=> '',// Oman
		'OS'	=> '',// South Ossetia
		'PA'	=> '',// Panama
		'PE'	=> '',// Peru
		'PF'	=> '',// French Polynesia
		'PG'	=> '',// Papua New Guinea
		'PH'	=> '',// Philippines
		'PK'	=> '',// Pakistan
		'PL'	=> '',// Poland
		'PM'	=> '',// Saint Pierre and Miquelon
		'PN'	=> '',// Pitcairn
		'PR'	=> '',// Puerto Rico
		'PS'	=> '',// Palestine
		'PT'	=> '',// Portugal
		'PW'	=> '',// Palau
		'PY'	=> '',// Paraguay
		'QA'	=> '',// Qatar
		'RE'	=> '',// Reunion
		'RO'	=> '',// Romania
		'RS'	=> '',// Serbia
		'RU'	=> '',// Russia
		'RW'	=> '',// Rwanda
		'SA'	=> '',// Saudi Arabia
		'SB'	=> '',// Solomon
		'SC'	=> '',// Seychelles
		'SD'	=> '',// Sudan
		'SE'	=> '',// Sweden
		'SG'	=> '',// Singapore
		'SH'	=> '',// Saint Helena, Ascension and Tristan Da Cunha
		'SI'	=> '',// Slovenia
		'SJ'	=> '',// Svalbard and Jan Mayen
		'SK'	=> '',// Slovakia
		'SL'	=> '',// Sierra Leone
		'SM'	=> '',// San Marino
		'SN'	=> '',// Senegal
		'SO'	=> '',// Somalia
		'SR'	=> '',// Suriname
		'SS'	=> '',// South Sudan
		'ST'	=> '',// Sao Tome and Principe
		'SV'	=> '',// El Salvador
		'SX'	=> '',// Sint Maarten
		'SY'	=> '',// Syria
		'SZ'	=> '',// Swaziland
		'TC'	=> '',// Turks and Caicos
		'TD'	=> '',// Chad
		'TF'	=> '',// French Southern and Antarctic Lands
		'TG'	=> '',// Togo
		'TH'	=> '',// Thailand
		'TJ'	=> '',// Tajikistan
		'TK'	=> '',// Tokelau
		'TL'	=> '',// East Timor
		'TM'	=> '',// Turkmenistan
		'TN'	=> '',// Tunisia
		'TO'	=> '',// Tonga
		'TR'	=> '',// Turkey
		'TS'	=> '',// Transnistria
		'TT'	=> '',// Trinidad and Tobago
		'TV'	=> '',// Tuvalu
		'TW'	=> '',// Taiwan
		'TZ'	=> '',// Tanzania
		'UA'	=> '',// Ukraine
		'UG'	=> '',// Uganda
		'UK'	=> '',// United Kingdom
		'UM'	=> '',// United States Minor Outlying Islands
		'US'	=> '',// United States
		'UY'	=> '',// Uruguay
		'UZ'	=> '',// Uzbekistan
		'VA'	=> '',// Vatican
		'VC'	=> '',// Saint Vincent and Grenadines
		'VE'	=> '',// Venezuela
		'VG'	=> '',// Virgin (UK)
		'VI'	=> '',// Virgin (US)
		'VN'	=> '',// Viet Nam: Please, 'Vietnamese' as demonym but our country name is 'Viet Nam', not 'Vietnam'
		'VU'	=> '',// Vanuatu
		'WF'	=> '',// Wallis and Futuna
		'WS'	=> '',// Samoa
		'YE'	=> '',// Yemen
		'YT'	=> '',// Mayotte
		'ZA'	=> '',// South Africa
		'ZM'	=> '',// Zambia
		'ZW'	=> '',// Zimbabwe
	),

	/**
	* AND conjunction
	*
	* Replace the symbol '&' in context with 'and' or anything in your language
	* Example: 'Bonaire, Sint Eustatius & Saba' -> 'Bonaire, Sint Eustatius and Saba'
	*/
	'COUNTRY_NAMES_AND'		=> 'and',
	'COUNTRY_NAMES_AND_EN'	=> 'and',// Keep it as English, DO NOT TRANSLATE!!!

	/**
	* Config
	*
	* Enable or disable using various forms of the country name
	* If your language do not use them, set false
	* If disabled, in context, the form will be replaced by country name (original, local or translation: depends on the setting in ACP)
	* If enabled but COUNTRY_NAMES_FORMS array is empty (below), default data in English will be used
	*/
	'COUNTRY_NAMES_CONFIG'	=> array(
		'person'	=> true,// Shows the name of a person from that country, ex: He is an Aland Islander
		'people'	=> true,// Shows the name of people from that country, ex: They are Aland Islanders
		'adj'		=> true,// Contains the word used to describe something from that country, ex: He loves an Alandish girl
	),

	/**
	* Demonyms
	*
	* If you want to translate various forms of country names into your language, set here with country code (quick see in COUNTRY_NAMES)
	* Default data from database is English
	*
	* person	Singular noun (a person)
	* people 	Plural noun (people, ethnic group)
	* adj		Adjective (demonym, language, culture...)
	*/
	'COUNTRY_NAMES_FORMS'	=> array(
		/* Example: ## is two-letters of country code
		'##'	=> array(
			'person'	=> '',
			'people'	=> '',
			'adj'		=> '',
		),
		*/
	),
));

/**
* COUNTRY FULLNAME TRANSLATION
*/
$lang = array_merge($lang, array(
	// Full names: some special cases for translating, add more country code if you like (quick see in COUNTRY_NAMES)
	'COUNTRY_FULLNAMES'		=> array(
		'BN'	=> '',// Nation of Brunei, the Abode of Peace
		'CD'	=> '',// Democratic Republic of the Congo
		'GR'	=> '',// Greece: Hellenic Republic
		'GS'	=> '',// South Georgia and the South Sandwich Islands
		'II'	=> '',// Islamic State of Iraq and the Levant
		'KN'	=> '',// Saint Kitts and Nevis: Federation of Saint Christopher and Nevis
		'KP'	=> '',// North Korea: Democratic People’s Republic of Korea
		'KR'	=> '',// South Korea: Republic of Korea
		'TS'	=> '',// Transnistria: Pridnestrovian Moldavian Republic
		'TW'	=> '',// Taiwan: 'Republic of China' or 'Province of China', JUST SET IT, that's your power :)
		'UK'	=> '',// United Kingdom of Great Britain and Northern Ireland
		'US'	=> '',// United States of America
		'VC'	=> '',// Saint Vincent and the Grenadines
		'VG'	=> '',// British Virgin Islands
		'VI'	=> '',// Virgin Islands of the United States
	),

	/**
	* Common cases of full names
	*
	* %1$s	string	Value of country name (original, local or translation: depends on the setting in ACP)
	* %2$s	string	Value of adjective form
	* %3$s	string	Value of parent name (old country)
	* %4$s	string	Value of parent adjective form (old country)
	*
	* Example:	Greenland (Denmark)
	* %1$s	->	Greenland
	* %2$s	->	Greenlandic
	* %3$s	->	Denmark
	* %4$s	->	Danish
	*/
	'COUNTRY_FULLNAMES_FORMAT'		=> array(
		'ADJ_CONFEDERATION'			=> '%2$s Confederation',
		'ADJ_FEDERATION'			=> '%2$s Federation',
		'ADJ_REPUBLIC'				=> '%2$s Republic',
		'ADJ_REPUBLIC_A'			=> '%2$s Arab Republic',
		'ADJ_REPUBLIC_AD'			=> '%2$s Arab Democratic Republic',
		'ADJ_REPUBLIC_PD'			=> '%2$s People’s Democratic Republic',
		'ADJ_STATES_U'				=> 'United %2$s States',
		'BAILIWICK_OF_NAME'			=> 'Bailiwick of %1$s',
		'COLLECTIVITY_OF_NAME'		=> 'Collectivity of %1$s',
		'COMMONWEALTH_OF_NAME'		=> 'Commonwealth of %1$s',
		'COUNTRY_OF_NAME'			=> 'Country of %1$s',
		'DEPARTMENT_OF_NAME'		=> 'Department of %1$s',
		'FEDERATION_OF_NAME'		=> 'Federation of %1$s',
		'GRAND_DUCHY_OF_NAME'		=> 'Grand Duchy of %1$s',
		'ISLE_OF_NAME'				=> 'Isle of %1$s',
		'KINGDOM_H_OF_NAME'			=> 'Hashemite Kingdom of %1$s',// Ex: Hashemite Kingdom of Jordan
		'KINGDOM_OF_NAME'			=> 'Kingdom of %1$s',
		'NAME_GROUP_OF_ISLANDS'		=> '%1$s Group of Islands',
		'NAME_ISLAND'				=> '%1$s Island',
		'NAME_ISLANDS'				=> '%1$s Islands',
		'NAME_PARENT_PART'			=> '%1$s (%4$s Part)',// Ex: Saint Martin (French Part)
		'NAME_REGION'				=> '%1$s Region',
		'NAME_REGION_OF_PARENT'		=> '%1$s Special Administrative Region of %3$s',// Ex: Hong Kong Special Administrative Region of China
		'NAME_REPUBLIC'				=> '%1$s Republic',
		'NAME_REPUBLIC_P'			=> '%1$s People’s Republic',
		'NAME_STATE_C'				=> '%1$s City State',
		'PRINCIPALITY_OF_NAME'		=> 'Principality of %1$s',
		'REPUBLIC_A_OF_NAME'		=> 'Arab Republic of %1$s',
		'REPUBLIC_B_OF_NAME'		=> 'Bolivarian Republic of %1$s',// Ex: Bolivarian Republic of Venezuela
		'REPUBLIC_C_OF_NAME'		=> 'Cooperative Republic of %1$s',
		'REPUBLIC_D_OF_NAME'		=> 'Democratic Republic of %1$s',
		'REPUBLIC_DP_OF_NAME'		=> 'Democratic People’s Republic of %1$s',
		'REPUBLIC_DS_OF_NAME'		=> 'Democratic Socialist Republic of %1$s',
		'REPUBLIC_E_OF_NAME'		=> 'Eastern Republic of %1$s',// Ex: Eastern Republic of Uruguay
		'REPUBLIC_F_OF_NAME'		=> 'Federal Republic of %1$s',
		'REPUBLIC_FD_OF_NAME'		=> 'Federal Democratic Republic of %1$s',
		'REPUBLIC_FE_OF_NAME'		=> 'Federative Republic of %1$s',
		'REPUBLIC_I_OF_NAME'		=> 'Islamic Republic of %1$s',
		'REPUBLIC_OF_NAME'			=> 'Republic of %1$s',
		'REPUBLIC_P_OF_NAME'		=> 'People’s Republic of %1$s',
		'REPUBLIC_PD_OF_NAME'		=> 'People’s Democratic Republic of %1$s',
		'REPUBLIC_S_OF_NAME'		=> 'Socialist Republic of %1$s',
		'REPUBLIC_T_OF_NAME'		=> 'Turkish Republic of %1$s',// Ex: Turkish Republic of Northern Cyprus
		'REPUBLIC_TU_OF_NAME'		=> 'Republic of the Union of %1$s',
		'REPUBLIC_U_OF_NAME'		=> 'United Republic of %1$s',
		'STATE_I_OF_NAME'			=> 'Independent State of %1$s',
		'STATE_OF_NAME'				=> 'State of %1$s',
		'STATE_P_OF_NAME'			=> 'Plurinational State of %1$s',
		'STATES_F_OF_NAME'			=> 'Federated States of %1$s',
		'SULTANATE_OF_NAME'			=> 'Sultanate of %1$s',
		'TERRITORY_OF_NAME'			=> 'Territory of %1$s',
		'THE_LOWER_NAME'			=> 'the %1$s',// Ex: Republic of the Congo
		'THE_UPPER_NAME'			=> 'The %1$s',// Ex: Commonwealth of The Bahamas
		'UNION_OF_NAME'				=> 'Union of %1$s',
	),

	// Need a prefix or suffix?
	'COUNTRY_FULLNAMES_FORMAT_WRAP'	=> 'The %s',// %s: value of COUNTRY_FULLNAMES_FORMAT above
));

/**
* COUNTRY TYPES
*
*	Sovereign state: country data + administrative units
*	Dependent territory: only country data, but linked to the "real unit" (first-level unit in Sovereign)
*	No-owner territory / Unrecognized state: only country data
*	Micronation: only country name + flag, puts into the "Micronations" group (on dropdown selection box)
*/
$lang = array_merge($lang, array(
	'COUNTRY_TYPES'	=> array(
		's'	=> 'Sovereign state',
		'd'	=> 'Dependent territory',
		't'	=> 'No-owner territory',// Antarctica
		'u'	=> 'Unrecognized state',
		'm'	=> 'Micronation',// Create your nation? Visit nationstates.net =)
	),
));

/**
* ADMINISTRATIVE UNITS
*
* name:		type name, use almost in the ACP
* display:	format name in 2 cases: 'abc' for alphanumeric and 'num' for numeric only
* count:	singular/plural forms
*
* Example 1: 'Ho Chi Minh' is the municipality of Viet Nam
*	> In the ACP, this administrative unit will be displayed with the field name 'Municipality' for unit type
*	> But no one says 'Ho Chi Minh Municipality', so we need convert it into 'Ho Chi Minh City' via defined string in 'display'
*
* Example 2: Ho Chi Minh City are subdivided into districts, 2 of them are '8' and 'Tan Phu'
*	> In English: 'District 8' and 'Tan Phu District' (letter first, number last)
*	> In Vietnamese: 'Quận 8' và 'Quận Tân Phú' (letter last, number last)
*/
$lang = array_merge($lang, array(
	'COUNTRY_UNIT_TYPES'	=> array(
		// Country-level units
		'c'		=> array(
			'name'		=> 'Country',
			'display'	=> array(
				'abc'	=> '%s Country',
				'num'	=> 'Country %d',
			),
			'count'	=> array(
				1	=> '%d country',
				2	=> '%d countries',
			),
		),
		'cc'	=> array(
			'name'		=> 'Autonomous Community',
			'display'	=> array(
				'abc'	=> '%s Community',
				'num'	=> 'Community %d',
			),
			'count'	=> array(
				1	=> '%d community',
				2	=> '%d communities',
			),
		),
		'cd'	=> array(
			'name'		=> 'Dependency',
			'display'	=> array(
				'abc'	=> '%s Dependency',
				'num'	=> 'Dependency %d',
			),
			'count'	=> array(
				1	=> '%d dependency',
				2	=> '%d dependencies',
			),
		),
		'cr'	=> array(
			'name'		=> 'Autonomous Republic',
			'display'	=> array(
				'abc'	=> '%s Republic',
				'num'	=> 'Republic %d',
			),
			'count'	=> array(
				1	=> '%d republic',
				2	=> '%d republics',
			),
		),
		'ct'	=> array(
			'name'		=> 'Territory',
			'display'	=> array(
				'abc'	=> '%s Territory',
				'num'	=> 'Territory %d',
			),
			'count'	=> array(
				1	=> '%d territory',
				2	=> '%d territories',
			),
		),
		// Region and similar units
		'r'		=> array(
			'name'		=> 'Region',
			'display'	=> array(
				'abc'	=> '%s Region',
				'num'	=> 'Region %d',
			),
			'count'	=> array(
				1	=> '%d region',
				2	=> '%d regions',
			),
		),
		'ra'	=> array(
			'name'		=> 'Area',
			'display'	=> array(
				'abc'	=> '%s Area',
				'num'	=> 'Area %d',
			),
			'count'	=> array(
				1	=> '%d area',
				2	=> '%d areas',
			),
		),
		'rd'	=> array(
			'name'		=> 'Division',
			'display'	=> array(
				'abc'	=> '%s Division',
				'num'	=> 'Division %d',
			),
			'count'	=> array(
				1	=> '%d divisions',
				2	=> '%d divisions',
			),
		),
		'rq'	=> array(
			'name'		=> 'Quarter',
			'display'	=> array(
				'abc'	=> '%s Quarter',
				'num'	=> 'Quarter %d',
			),
			'count'	=> array(
				1	=> '%d quarter',
				2	=> '%d quarters',
			),
		),
		'rz'	=> array(
			'name'		=> 'Zone',
			'display'	=> array(
				'abc'	=> '%s Zone',
				'num'	=> 'Zone %d',
			),
			'count'	=> array(
				1	=> '%d zone',
				2	=> '%d zones',
			),
		),
		// State and similar units
		's'		=> array(
			'name'		=> 'State',
			'display'	=> array(
				'abc'	=> '%s State',
				'num'	=> 'State %d',
			),
			'count'	=> array(
				1	=> '%d state',
				2	=> '%d states',
			),
		),
		'sa'	=> array(
			'name'		=> 'Autonomous Area',
			'display'	=> array(
				'abc'	=> '%s Autonomous Area',
				'num'	=> 'Autonomous Area %d',
			),
			'count'	=> array(
				1	=> '%d autonomous area',
				2	=> '%d autonomous areas',
			),
		),
		'sc'	=> array(
			'name'		=> 'Canton',
			'display'	=> array(
				'abc'	=> '%s Canton',
				'num'	=> 'Canton %d',
			),
			'count'	=> array(
				1	=> '%d cantons',
				2	=> '%d cantons',
			),
		),
		'sg'	=> array(
			'name'		=> 'Governorate',
			'display'	=> array(
				'abc'	=> '%s Governorate',
				'num'	=> 'Governorate %d',
			),
			'count'	=> array(
				1	=> '%d governorate',
				2	=> '%d governorates',
			),
		),
		'sr'	=> array(
			'name'		=> 'Autonomous Region',
			'display'	=> array(
				'abc'	=> '%s Autonomous Region',
				'num'	=> 'Autonomous Region %d',
			),
			'count'	=> array(
				1	=> '%d autonomous region',
				2	=> '%d autonomous regions',
			),
		),
		// Province and similar units
		'p'		=> array(
			'name'		=> 'Province',
			'display'	=> array(
				'abc'	=> '%s Province',
				'num'	=> 'Province %d',
			),
			'count'	=> array(
				1	=> '%d province',
				2	=> '%d provinces',
			),
		),
		'pc'	=> array(
			'name'		=> 'County',
			'display'	=> array(
				'abc'	=> '%s County',
				'num'	=> 'County %d',
			),
			'count'	=> array(
				1	=> '%d county',
				2	=> '%d counties',
			),
		),
		'pd'	=> array(
			'name'		=> 'Department',
			'display'	=> array(
				'abc'	=> '%s Department',
				'num'	=> 'Department %d',
			),
			'count'	=> array(
				1	=> '%d department',
				2	=> '%d departments',
			),
		),
		'pi'	=> array(
			'name'		=> 'Island',
			'display'	=> array(
				'abc'	=> '%s Island',
				'num'	=> 'Island %d',
			),
			'count'	=> array(
				1	=> '%d island',
				2	=> '%d islands',
			),
		),
		'pis'	=> array(
			'name'		=> 'Islands',
			'display'	=> array(
				'abc'	=> '%s Islands',
				'num'	=> 'No. %d Islands',
			),
			'count'	=> array(
				1	=> '%d group of islands',
				2	=> '%d groups of islands',
			),
		),
		'pl'	=> array(
			'name'		=> 'Council',
			'display'	=> array(
				'abc'	=> '%s Council',
				'num'	=> 'Council %d',
			),
			'count'	=> array(
				1	=> '%d council',
				2	=> '%d councils',
			),
		),
		'po'	=> array(
			'name'		=> 'Oblast',
			'display'	=> array(
				'abc'	=> '%s Oblast',
				'num'	=> 'Oblast %d',
			),
			'count'	=> array(
				1	=> '%d oblast',
				2	=> '%d oblasts',
			),
		),
		'pp'	=> array(
			'name'		=> 'Parish',
			'display'	=> array(
				'abc'	=> '%s Parish',
				'num'	=> 'Parish %d',
			),
			'count'	=> array(
				1	=> '%d parish',
				2	=> '%d parishes',
			),
		),
		// Municipality and similar units
		'm'		=> array(
			'name'		=> 'Municipality',
			'display'	=> array(
				'abc'	=> '%s City',
				'num'	=> 'City %d',
			),
			'count'	=> array(
				1	=> '%d municipality',
				2	=> '%d municipalities',
			),
		),
		'mc'	=> array(
			'name'		=> 'City',
			'display'	=> array(
				'abc'	=> '%s City',
				'num'	=> 'City %d',
			),
			'count'	=> array(
				1	=> '%d city',
				2	=> '%d cities',
			),
		),
		// District and similar units
		'd'		=> array(
			'name'		=> 'District',
			'display'	=> array(
				'abc'	=> '%s District',
				'num'	=> 'District %d',
			),
			'count'	=> array(
				1	=> '%d district',
				2	=> '%d districts',
			),
		),
		'db'	=> array(
			'name'		=> 'Borough',
			'display'	=> array(
				'abc'	=> '%s Borough',
				'num'	=> 'Borough %d',
			),
			'count'	=> array(
				1	=> '%d borough',
				2	=> '%d boroughs',
			),
		),
		'dp'	=> array(
			'name'		=> 'Prefecture',
			'display'	=> array(
				'abc'	=> '%s Prefecture',
				'num'	=> 'Prefecture %d',
			),
			'count'	=> array(
				1	=> '%d prefecture',
				2	=> '%d prefectures',
			),
		),
		'dr'	=> array(
			'name'		=> 'Rural district',
			'display'	=> array(
				'abc'	=> '%s District',
				'num'	=> 'District %d',
			),
			'count'	=> array(
				1	=> '%d rural district',
				2	=> '%d rural districts',
			),
		),
		'dt'	=> array(
			'name'		=> 'Township',
			'display'	=> array(
				'abc'	=> '%s Township',
				'num'	=> 'Township %d',
			),
			'count'	=> array(
				1	=> '%d township',
				2	=> '%d townships',
			),
		),
		// Ward and similar units
		'w'		=> array(
			'name'		=> 'Ward',
			'display'	=> array(
				'abc'	=> '%s Ward',
				'num'	=> 'Ward %d',
			),
			'count'	=> array(
				1	=> '%d ward',
				2	=> '%d wards',
			),
		),
		'wc'	=> array(
			'name'		=> 'Commune',
			'display'	=> array(
				'abc'	=> '%s Commune',
				'num'	=> 'Commune %d',
			),
			'count'	=> array(
				1	=> '%d commune',
				2	=> '%d communes',
			),
		),
		'wr'	=> array(
			'name'		=> 'Rural Commune',
			'display'	=> array(
				'abc'	=> '%s Commune',
				'num'	=> 'Commune %d',
			),
			'count'	=> array(
				1	=> '%d rural commune',
				2	=> '%d rural communes',
			),
		),
		'ws'	=> array(
			'name'		=> 'Settlement',
			'display'	=> array(
				'abc'	=> '%s Settlement',
				'num'	=> 'Settlement %d',
			),
			'count'	=> array(
				1	=> '%d settlement',
				2	=> '%d settlements',
			),
		),
		'wt'	=> array(
			'name'		=> 'Town',
			'display'	=> array(
				'abc'	=> '%s Town',
				'num'	=> 'Town %d',
			),
			'count'	=> array(
				1	=> '%d town',
				2	=> '%d towns',
			),
		),
		// Village and similar units
		'v'		=> array(
			'name'		=> 'Village',
			'display'	=> array(
				'abc'	=> '%s Village',
				'num'	=> 'Village %d',
			),
			'count'	=> array(
				1	=> '%d village',
				2	=> '%d villages',
			),
		),
		'vn'	=> array(
			'name'		=> 'Neighbourhood',
			'display'	=> array(
				'abc'	=> '%s Neighbourhood',
				'num'	=> 'Neighbourhood %d',
			),
			'count'	=> array(
				1	=> '%d neighbourhood',
				2	=> '%d neighbourhoods',
			),
		),
		'vt'	=> array(
			'name'		=> 'Tribe',
			'display'	=> array(
				'abc'	=> '%s Tribe',
				'num'	=> 'Tribe %d',
			),
			'count'	=> array(
				1	=> '%d tribe',
				2	=> '%d tribes',
			),
		),
	),
));

/**
* COMMON
*/
$lang = array_merge($lang, array(
));
