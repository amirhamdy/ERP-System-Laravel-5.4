<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->delete();

        $languages = array(
            array(

                "name" => "Afrikanns",
                "code" => "AF"),
            array(

                "name" => "Albanian",
                "code" => "SQ"),
            array(

                "name" => "Arabic",
                "code" => "AR"),
            array(

                "name" => "Armenian",
                "code" => "HY"),
            array(

                "name" => "Basque",
                "code" => "EU"),
            array(
                "name" => "Bengali",
                "code" => "BN"),
            array(

                "name" => "Bulgarian",
                "code" => "BG"),
            array(

                "name" => "Catalan",
                "code" => "CA"),
            array(

                "name" => "Cambodian",
                "code" => "KM"),
            array(
                "name" => "Chinese (Mandarin)",
                "code" => "ZH"),
            array(

                "name" => "Croation",
                "code" => "HR"),
            array(

                "name" => "Czech",
                "code" => "CS"),
            array(

                "name" => "Danish",
                "code" => "DA"),
            array(

                "name" => "Dutch",
                "code" => "NL"),
            array(

                "name" => "English",
                "code" => "EN"),
            array(

                "name" => "Estonian",
                "code" => "ET"),
            array(

                "name" => "Fiji",
                "code" => "FJ"),
            array(

                "name" => "Finnish",
                "code" => "FI"),
            array(

                "name" => "French",
                "code" => "FR"),
            array(

                "name" => "Georgian",
                "code" => "KA"),
            array(

                "name" => "German",
                "code" => "DE"),
            array(

                "name" => "Greek",
                "code" => "EL"),
            array(

                "name" => "Gujarati",
                "code" => "GU"),
            array(

                "name" => "Hebrew",
                "code" => "HE"),
            array(

                "name" => "Hindi",
                "code" => "HI"),
            array(

                "name" => "Hungarian",
                "code" => "HU"),
            array(

                "name" => "Icelandic",
                "code" => "IS"),
            array(

                "name" => "Indonesian",
                "code" => "ID"),
            array(

                "name" => "Irish",
                "code" => "GA"),
            array(

                "name" => "Italian",
                "code" => "IT"),
            array(

                "name" => "Japanese",
                "code" => "JA"),
            array(

                "name" => "Javanese",
                "code" => "JW"),
            array(

                "name" => "Korean",
                "code" => "KO"),
            array(

                "name" => "Latin",
                "code" => "LA"),
            array(

                "name" => "Latvian",
                "code" => "LV"),
            array(

                "name" => "Lithuanian",
                "code" => "LT"),
            array(

                "name" => "Macedonian",
                "code" => "MK"),
            array(

                "name" => "Malay",
                "code" => "MS"),
            array(

                "name" => "Malayalam",
                "code" => "ML"),
            array(

                "name" => "Maltese",
                "code" => "MT"),
            array(
                "name" => "Maori",
                "code" => "MI"),
            array(

                "name" => "Marathi",
                "code" => "MR"),
            array(

                "name" => "Mongolian",
                "code" => "MN"),
            array(
                "name" => "Nepali",
                "code" => "NE"),
            array(

                "name" => "Norwegian",
                "code" => "NO"),
            array(

                "name" => "Persian",
                "code" => "FA"),
            array(

                "name" => "Polish",
                "code" => "PL"),
            array(

                "name" => "Portuguese",
                "code" => "PT"),
            array(

                "name" => "Punjabi",
                "code" => "PA"),
            array(

                "name" => "Quechua",
                "code" => "QU"),
            array(

                "name" => "Rumano",
                "code" => "RO"),
            array(

                "name" => "Russian",
                "code" => "RU"),
            array(

                "name" => "Samoan",
                "code" => "SM"),
            array(

                "name" => "Serbian",
                "code" => "SR"),
            array(

                "name" => "Slovak",
                "code" => "SK"),
            array(

                "name" => "Slovenian",
                "code" => "SL"),
            array(

                "name" => "Spanish",
                "code" => "ES"),
            array(

                "name" => "Swahili",
                "code" => "SW"),
            array(
                "name" => "Swedish ",
                "code" => "SV"),
            array(

                "name" => "Tamil",
                "code" => "TA"),
            array(

                "name" => "Tatar",
                "code" => "TT"),
            array(

                "name" => "Telugu",
                "code" => "TE"),
            array(

                "name" => "Thai",
                "code" => "TH"),
            array(

                "name" => "Tibetan",
                "code" => "BO"),
            array(

                "name" => "Tonga",
                "code" => "TO"),
            array(

                "name" => "Turkish",
                "code" => "TR"),
            array(

                "name" => "Ukranian",
                "code" => "UK"),
            array(

                "name" => "Urdu",
                "code" => "UR"),
            array(

                "name" => "Uzbek",
                "code" => "UZ"),
            array(

                "name" => "Vietnamese",
                "code" => "VI"),
            array(

                "name" => "Welsh",
                "code" => "CY"),
            array(

                "name" => "Xhosa",
                "code" => "XH"),

        );

        foreach ($languages as $key => $value) {
            Language::create($value);
        }
    }
}
