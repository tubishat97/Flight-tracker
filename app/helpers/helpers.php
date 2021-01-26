<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('getHeaderLang')) {
    /**
     * Read HTTP_ACCEPT_LANGUAGE from header
     *
     * @return string
     */
    function getHeaderLang()
    {
        !empty(request()->server('HTTP_ACCEPT_LANGUAGE')) ? $lang = request()->server('HTTP_ACCEPT_LANGUAGE') : $lang = 'en';
        return $lang;
    }
}

if (!function_exists('makeArabicSlug')) {
    /**
     * Create a web friendly URL slug from a string.
     *
     * Although supported, transliteration is discouraged because
     *     1) most web browsers support UTF-8 characters in URLs
     *     2) transliteration causes a loss of information
     *
     * @author Ammar Midani <ammar.midani.1994@gmail.com>
     * @param string $string
     * @param array $options (delimiter = '-', limit = 100, lowercase = true, replacements = [], transliterate = false, limitWords = 5 )
     * @return string
     */
    function makeArabicSlug($string, $options = [])
    {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $string = mb_convert_encoding((string)$string, 'UTF-8', mb_list_encodings());

        $defaults = [
            'delimiter' => '-',
            'limit' => 100,
            'lowercase' => true,
            'replacements' => [],
            'transliterate' => false,
            'limitWords' => 5,
        ];

        // Merge options
        $options = array_merge($defaults, $options);

        $char_map = [
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        ];

        // Remove spaces from the beginning and from the end of the string
        // and limit words to $limitWords
        $string = implode(' ', array_slice(explode(' ', trim($string)), 0, $options['limitWords']));

        // Make custom replacements
        $string = preg_replace(array_keys($options['replacements']), $options['replacements'], $string);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $string = str_replace(array_keys($char_map), $char_map, $string);
        }

        // Replace non-alphanumeric characters with our delimiter
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $string);

        // Remove duplicate delimiters
        $string = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $string);

        // Truncate slug to max. characters
        $string = mb_substr($string, 0, ($options['limit'] ? $options['limit'] : mb_strlen($string, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $string = trim($string, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($string, 'UTF-8') : $string;
    }
}

if (!function_exists('getUserTokenFromBearerToken')) {
    /**
     * get the user access_token from bearer token;
     *
     * To get the user by the token, you need to understand what the token is.
     * The token is broken up into three base64 encoded parts: the header, the payload, and the signature,
     * separated by periods.
     * In your case, since you're just wanting to find the user, you just need the header
     *
     * @author Ammar Midani <ammar.midani.1994@gmail.com>
     * @param string $bearer_token Bearer xxxxxxxx
     * @return string user token
     */
    function getUserTokenFromBearerToken($bearer_token)
    {
        try {
            $auth_header = explode(' ', $bearer_token);
            $token = $auth_header[1];

            // break up the token into its three respective parts
            $token_parts = explode('.', $token);
            $token_header = $token_parts[1];

            // base64 decode to get a json string
            $token_header_json = base64_decode($token_header);
            $token_header_array = json_decode($token_header_json, true);
            $user_token = $token_header_array['jti'];
            return $user_token;
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('getUserFromAccessToken')) {
    /**
     * get the user row from mathcing class;
     *
     * @author Ammar Midani <ammar.midani.1994@gmail.com>
     * @param string $access_token
     * @return string user
     */
    function getUserFromAccessToken($access_token)
    {
        try {
            $result = DB::table('oauth_access_tokens')->where('id', $access_token)->first();
            if ($result)
                return $result->user_id;
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('distance')) {
    /**
     * Computes the distance between two coordinates.
     *
     * @author Ammar Midani <ammar.midani.1994@gmail.com>
     * @param float $latitude1 Latitude of start point in [deg decimal]
     * @param float $longitude1 Longitude of start point in [deg decimal]
     * @param float $latitude2 Latitude of target point in [deg decimal]
     * @param float $longitude2 Longitude of target point in [deg decimal]
     * @return float Distance between points in [km]
     */
    function distance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6372.797; // radius of Earth in km
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
    }

    if (!function_exists('calculatePendingTime')) {
        function calculatePendingTime($created_at)
        {
            $date1 = strtotime($created_at);
            $date2 = strtotime(now());

            $diff = abs($date2 - $date1);

            $years = floor($diff / (365 * 60 * 60 * 24));

            $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                / (30 * 60 * 60 * 24));

            $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            $hours = floor(($diff - $years * 365 * 60 * 60 * 24
                - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
                / (60 * 60));

            $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
                - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
                - $hours * 60 * 60) / 60);

            $years = $years !== 0.0 ? sprintf("%d years", $years) : '';
            $months = $months !== 0.0 ? sprintf("%d months, ", $months) : '';
            $days = $days !== 0.0 ? sprintf("%d days, ", $days) : '';
            $hours = $hours !== 0.0 ? sprintf("%d hours, ", $hours) : '';
            $minutes = $minutes !== 0.0 ? sprintf("%d minutes", $minutes) : '';

            return $years . $months . $days . $hours . $minutes;
        }
    }

    if (!function_exists('bookingTimes')) {
        function bookingTimes()
        {
            return [
                'one' => [
                    ['from' => '01:00' , 'to' => '02:00'],
                    ['from' => '02:00' , 'to' => '03:00'],
                    ['from' => '03:00' , 'to' => '04:00'],
                    ['from' => '04:00' , 'to' => '05:00'],
                    ['from' => '05:00' , 'to' => '06:00'],
                    ['from' => '06:00' , 'to' => '07:00'],
                    ['from' => '07:00' , 'to' => '08:00'],
                    ['from' => '08:00' , 'to' => '09:00'],
                    ['from' => '09:00' , 'to' => '10:00'],
                    ['from' => '10:00' , 'to' => '11:00'],
                    ['from' => '11:00' , 'to' => '12:00'],
                    ['from' => '12:00' , 'to' => '13:00'],
                    ['from' => '13:00' , 'to' => '14:00'],
                    ['from' => '14:00' , 'to' => '15:00'],
                    ['from' => '15:00' , 'to' => '16:00'],
                    ['from' => '16:00' , 'to' => '17:00'],
                    ['from' => '17:00' , 'to' => '18:00'],
                    ['from' => '18:00' , 'to' => '19:00'],
                    ['from' => '19:00' , 'to' => '20:00'],
                    ['from' => '20:00' , 'to' => '21:00'],
                    ['from' => '21:00' , 'to' => '22:00'],
                    ['from' => '22:00' , 'to' => '23:00'],
                    ['from' => '23:00' , 'to' => '24:00'],
                    ['from' => '24:00' , 'to' => '01:00'],
                ],
                'two' => [
                    ['from' => '00:00' , 'to' => '02:00'],
                    ['from' => '02:00' , 'to' => '04:00'],
                    ['from' => '04:00' , 'to' => '06:00'],
                    ['from' => '06:00' , 'to' => '08:00'],
                    ['from' => '08:00' , 'to' => '10:00'],
                    ['from' => '10:00' , 'to' => '12:00'],
                    ['from' => '12:00' , 'to' => '14:00'],
                    ['from' => '14:00' , 'to' => '16:00'],
                    ['from' => '16:00' , 'to' => '18:00'],
                    ['from' => '18:00' , 'to' => '20:00'],
                    ['from' => '20:00' , 'to' => '22:00'],
                    ['from' => '22:00' , 'to' => '00:00'],
                ],
                'three' => [
                    ['from' => '00:00' , 'to' => '03:00'],
                    ['from' => '03:00' , 'to' => '06:00'],
                    ['from' => '09:00' , 'to' => '12:00'],
                    ['from' => '12:00' , 'to' => '15:00'],
                    ['from' => '15:00' , 'to' => '18:00'],
                    ['from' => '18:00' , 'to' => '21:00'],
                    ['from' => '21:00' , 'to' => '00:00'],
                ],
                'four' => [
                    ['from' => '00:00' , 'to' => '04:00'],
                    ['from' => '04:00' , 'to' => '08:00'],
                    ['from' => '08:00' , 'to' => '12:00'],
                    ['from' => '12:00' , 'to' => '16:00'],
                    ['from' => '16:00' , 'to' => '20:00'],
                    ['from' => '20:00' , 'to' => '24:00'],
                    ['from' => '21:00' , 'to' => '00:00'],
                ],
                'five' => [
                    ['from' => '00:00' , 'to' => '05:00'],
                    ['from' => '05:00' , 'to' => '10:00'],
                    ['from' => '10:00' , 'to' => '15:00'],
                    ['from' => '15:00' , 'to' => '20:00'],
                ],
                'six' => [
                    ['from' => '00:00' , 'to' => '06:00'],
                    ['from' => '06:00' , 'to' => '12:00'],
                    ['from' => '12:00' , 'to' => '18:00'],
                    ['from' => '18:00' , 'to' => '00:00'],
                ],
                'seven' => [
                    ['from' => '00:00' , 'to' => '07:00'],
                    ['from' => '07:00' , 'to' => '14:00'],
                    ['from' => '14:00' , 'to' => '21:00'],
                ],
                'eight' => [
                    ['from' => '00:00' , 'to' => '08:00'],
                    ['from' => '08:00' , 'to' => '16:00'],
                    ['from' => '16:00' , 'to' => '00:00'],
                ],
            ];
        }
    }
}
