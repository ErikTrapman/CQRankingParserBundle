<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Nationality;

class NationalityResolver
{
    private $cqNationalities = array(
        "Afg" => "Afghanistan",
        "Aho" => "Netherlands Antilles",
        "Aia" => "Anguilla",
        "Alb" => "Albania",
        "Alg" => "Algeria",
        "And" => "Andorra",
        "Ang" => "Angola",
        "Ant" => "Antigua and Barbuda",
        "Arg" => "Argentina",
        "Arm" => "Armenia",
        "Aru" => "Aruba",
        "Aus" => "Australia",
        "Aut" => "Austria",
        "Aze" => "Azerbaijan",
        "Bah" => "Bahamas",
        "Ban" => "Bangladesh",
        "Bar" => "Barbados",
        "Bdi" => "Burundi",
        "Bel" => "Belgium",
        "Ben" => "Bénin",
        "Ber" => "Bermuda",
        "Bih" => "Bosnia and Herzegovina",
        "Biz" => "Belize",
        "Blr" => "Belarus",
        "Bol" => "Bolivia",
        "Bot" => "Botswana",
        "Bra" => "Brazil",
        "Brn" => "Bahrain",
        "Bru" => "Brunei",
        "Bul" => "Bulgaria",
        "Bur" => "Burkina Faso",
        "Caf" => "Central African Republic",
        "Cam" => "Cambodia",
        "Can" => "Canada",
        "Cay" => "Cayman Islands",
        "Cgo" => "Congo-Brazzaville",
        "Chi" => "Chile",
        "Chn" => "China",
        "Civ" => "Ivory Coast",
        "Cmr" => "Cameroon",
        "Cod" => "Congo",
        "Cok" => "Cook Islands",
        "Col" => "Colombia",
        "Com" => "Comoros",
        "Crc" => "Costa Rica",
        "Cro" => "Croatia",
        "Cub" => "Cuba",
        "Cur" => "Curaçao",
        "Cyp" => "Cyprus",
        "Cze" => "Czech Republic",
        "Den" => "Denmark",
        "Dom" => "Dominican Republic",
        "Ecu" => "Ecuador",
        "Egy" => "Egypt",
        "Eri" => "Eritrea",
        "Esa" => "El Salvador",
        "Esp" => "Spain",
        "Est" => "Estonia",
        "Eth" => "Ethiopia",
        "Fij" => "Fiji",
        "Fin" => "Finland",
        "Fra" => "France",
        "Gab" => "Gabon",
        "Gam" => "Gambia",
        "Gbr" => "Great Britain",
        "Geo" => "Georgia",
        "Ger" => "Germany",
        "Gha" => "Ghana",
        "Gre" => "Greece",
        "Grn" => "Grenada",
        "Gua" => "Guatemala",
        "Gui" => "Guinea",
        "Gum" => "Guam",
        "Guy" => "Guyana",
        "Hai" => "Haiti",
        "Hkg" => "Hong Kong",
        "Hon" => "Honduras",
        "Hun" => "Hungary",
        "Ina" => "Indonesia",
        "Ind" => "India",
        "Iri" => "Iran",
        "Irl" => "Ireland",
        "Irq" => "Iraq",
        "Isl" => "Iceland",
        "Isr" => "Israel",
        "Isv" => "United States Virgin Islands",
        "Ita" => "Italy",
        "Ivb" => "British Virgin Islands",
        "Jam" => "Jamaica",
        "Jor" => "Jordan",
        "Jpn" => "Japan",
        "Kaz" => "Kazakhstan",
        "Ken" => "Kenya",
        "Kgz" => "Kyrgyzstan",
        "Kor" => "South Korea",
        "Ksa" => "Saudi Arabia",
        "Kuw" => "Kuwait",
        "Lao" => "Laos",
        "Lat" => "Latvia",
        "Lba" => "Libya",
        "Lca" => "Saint Lucia",
        "Les" => "Lesotho",
        "Lib" => "Lebanon",
        "Lie" => "Liechtenstein",
        "Ltu" => "Lithuania",
        "Lux" => "Luxembourg",
        "Mac" => "Macau SAR China",
        "Mad" => "Madagascar",
        "Mar" => "Morocco",
        "Mas" => "Malaysia",
        "Maw" => "Malawi",
        "Mda" => "Moldova",
        "Mex" => "Mexico",
        "Mgl" => "Mongolia",
        "Mkd" => "F.Y.R. of Macedonia",
        "Mli" => "Mali",
        "Mlt" => "Malta",
        "Mne" => "Montenegro",
        "Mon" => "Monaco",
        "Moz" => "Mozambique",
        "Mri" => "Mauritius",
        "Mya" => "Myanmar",
        "Nam" => "Namibia",
        "Nca" => "Nicaragua",
        "Ned" => "Netherlands",
        "Nep" => "Nepal",
        "Ngr" => "Nigeria",
        "Nig" => "Niger",
        "Nor" => "Norway",
        "Nzl" => "New Zealand",
        "Oma" => "Oman",
        "Pak" => "Pakistan",
        "Pan" => "Panama",
        "Par" => "Paraguay",
        "Per" => "Peru",
        "Phi" => "Philippines",
        "Pol" => "Poland",
        "Por" => "Portugal",
        "Prk" => "North Korea",
        "Pur" => "Puerto Rico",
        "Qat" => "Qatar",
        "Rou" => "Romania",
        "Rsa" => "South Africa",
        "Rus" => "Russia",
        "Rwa" => "Rwanda",
        "Scg" => "Serbia and Montenegro",
        "Sen" => "Senegal",
        "Sey" => "Seychelles",
        "Sin" => "Singapore",
        "Skn" => "Saint Kitts and Nevis",
        "Sle" => "Sierra Leone",
        "Slo" => "Slovenia",
        "Smr" => "San Marino",
        "Som" => "Somalia",
        "Srb" => "Serbia",
        "Sri" => "Sri Lanka",
        "Stp" => "Sao Tome and Principe",
        "Sud" => "Sudan",
        "Sui" => "Switzerland",
        "Sur" => "Suriname",
        "Svk" => "Slovakia",
        "Swe" => "Sweden",
        "Syr" => "Syria",
        "Tan" => "Tanzania",
        "Tha" => "Thailand",
        "Tkm" => "Turkmenistan",
        "Tls" => "East Timor",
        "Tog" => "Togo",
        "Tpe" => "Taiwan",
        "Tri" => "Trinidad and Tobago",
        "Tun" => "Tunisia",
        "Tur" => "Turkey",
        "Uae" => "United Arab Emirates",
        "Uga" => "Uganda",
        "Ukr" => "Ukraine",
        "Uru" => "Uruguay",
        "Usa" => "United States",
        "Uzb" => "Uzbekistan",
        "Ven" => "Venezuela",
        "Vie" => "Vietnam",
        "Vin" => "Saint Vincent and the Grenadines",
        "Yem" => "Yemen",
        "Yug" => "Yugoslavia",
        "Zam" => "Zambia",
        "Zim" => "Zimbabwe",
    );

    /**
     * Diff based on cldr.country.en_GB.yaml
     * @see translations/umpirsky/country-list
     */
    private $cldrDiff = array(
        "Cgo" => "Congo - Brazzaville",
        "Civ" => "Côte d’Ivoire",
        "Gbr" => "United Kingdom",
        "Hkg" => "Hong Kong SAR China",
        "Isv" => "U.S. Virgin Islands",
        "Mkd" => "Macedonia",
        "Tls" => "Timor-Leste"
    );

    public function __construct()
    {
        
    }

    public function getFullNameFromCode($code)
    {
        $code = ucfirst(strtolower($code));
        if (array_key_exists($code, $this->cldrDiff)) {
            return $this->cldrDiff[$code];
        }
        if (array_key_exists($code, $this->cqNationalities)) {
            return $this->cqNationalities[$code];
        }
        return null;
    }
}