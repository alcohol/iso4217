<?php

/*
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol;

/**
 * A library providing ISO 4217 data.
 */
class ISO4217
{
    /**
     * @api
     *
     * @param string $code
     *
     * @throws \OutOfBoundsException
     *
     * @return array
     */
    public function getByCode($code)
    {
        foreach ($this->currencies as $currency) {
            if (0 === strcasecmp($code, $currency['alpha3']) ||
                0 === strcasecmp($code, $currency['numeric'])) {
                return $currency;
            }
        }

        throw new \OutOfBoundsException('ISO 4217 does not contain: '.$code);
    }

    /**
     * @api
     *
     * @uses ::getByCode()
     *
     * @param string $alpha3
     *
     * @throws \DomainException
     *
     * @return array
     */
    public function getByAlpha3($alpha3)
    {
        if (!preg_match('/^[a-zA-Z]{3}$/', $alpha3)) {
            throw new \DomainException('Not a valid alpha3: '.$alpha3);
        }

        return $this->getByCode($alpha3);
    }

    /**
     * @api
     *
     * @uses ::getByCode()
     *
     * @param string $numeric
     *
     * @throws \DomainException
     *
     * @return array
     */
    public function getByNumeric($numeric)
    {
        if (!preg_match('/^[0-9]{3}$/', $numeric)) {
            throw new \DomainException('Not a valid numeric: '.$numeric);
        }

        return $this->getByCode($numeric);
    }

    /**
     * @api
     *
     * @uses ::$currencies
     *
     * @return array
     */
    public function getAll()
    {
        return $this->currencies;
    }

    /**
     * @internal
     *
     * @var array
     */
    protected $currencies = [
        [
            'name' => 'UAE Dirham',
            'alpha3' => 'AED',
            'numeric' => '784',
            'exp' => 2,
            'country' => 'AE',
        ],
        [
            'name' => 'Afghan Afghani',
            'alpha3' => 'AFN',
            'numeric' => '971',
            'exp' => 2,
            'country' => 'AF',
        ],
        [
            'name' => 'Albanian Lek',
            'alpha3' => 'ALL',
            'numeric' => '008',
            'exp' => 2,
            'country' => 'AL',
        ],
        [
            'name' => 'Armenian Dram',
            'alpha3' => 'AMD',
            'numeric' => '051',
            'exp' => 2,
            'country' => 'AM',
        ],
        [
            'name' => 'Netherlands Antillean Guilder',
            'alpha3' => 'ANG',
            'numeric' => '532',
            'exp' => 2,
            'country' => [
                'CW',
                'SX',
            ],
        ],
        [
            'name' => 'Angolan Kwanza',
            'alpha3' => 'AOA',
            'numeric' => '973',
            'exp' => 2,
            'country' => 'AO',
        ],
        [
            'name' => 'Argentine Peso',
            'alpha3' => 'ARS',
            'numeric' => '032',
            'exp' => 2,
            'country' => 'AR',
        ],
        [
            'name' => 'Australian Dollar',
            'alpha3' => 'AUD',
            'numeric' => '036',
            'exp' => 2,
            'country' => [
                'AU',
                'CC',
                'CX',
                'HM',
                'KI',
                'NF',
                'NR',
                'TV',
            ],
        ],
        [
            'name' => 'Aruban Florin',
            'alpha3' => 'AWG',
            'numeric' => '533',
            'exp' => 2,
            'country' => 'AW',
        ],
        [
            'name' => 'Azerbaijani Manat',
            'alpha3' => 'AZN',
            'numeric' => '944',
            'exp' => 2,
            'country' => 'AZ',
        ],
        [
            'name' => 'Bosnia and Herzegovina Convertible Mark',
            'alpha3' => 'BAM',
            'numeric' => '977',
            'exp' => 2,
            'country' => 'BA',
        ],
        [
            'name' => 'Barbados Dollar',
            'alpha3' => 'BBD',
            'numeric' => '052',
            'exp' => 2,
            'country' => 'BB',
        ],
        [
            'name' => 'Bangladeshi Taka',
            'alpha3' => 'BDT',
            'numeric' => '050',
            'exp' => 2,
            'country' => 'BD',
        ],
        [
            'name' => 'Bulgarian Lev',
            'alpha3' => 'BGN',
            'numeric' => '975',
            'exp' => 2,
            'country' => 'BG',
        ],
        [
            'name' => 'Bahraini Dinar',
            'alpha3' => 'BHD',
            'numeric' => '048',
            'exp' => 3,
            'country' => 'BH',
        ],
        [
            'name' => 'Burundian Franc',
            'alpha3' => 'BIF',
            'numeric' => '108',
            'exp' => 0,
            'country' => 'BI',
        ],
        [
            'name' => 'Bermudian Dollar',
            'alpha3' => 'BMD',
            'numeric' => '060',
            'exp' => 2,
            'country' => 'BM',
        ],
        [
            'name' => 'Brunei Dollar',
            'alpha3' => 'BND',
            'numeric' => '096',
            'exp' => 2,
            'country' => 'BN',
        ],
        [
            'name' => 'Boliviano',
            'alpha3' => 'BOB',
            'numeric' => '068',
            'exp' => 2,
            'country' => 'BO',
        ],
        [
            'name' => 'Brazilian Real',
            'alpha3' => 'BRL',
            'numeric' => '986',
            'exp' => 2,
            'country' => 'BR',
        ],
        [
            'name' => 'Bahamian Dollar',
            'alpha3' => 'BSD',
            'numeric' => '044',
            'exp' => 2,
            'country' => 'BS',
        ],
        [
            'name' => 'Bhutanese Ngultrum',
            'alpha3' => 'BTN',
            'numeric' => '064',
            'exp' => 2,
            'country' => 'BT',
        ],
        [
            'name' => 'Botswana Pula',
            'alpha3' => 'BWP',
            'numeric' => '072',
            'exp' => 2,
            'country' => [
                'BW',
                'ZW',
            ],
        ],
        [
            'name' => 'Belarussian Ruble',
            'alpha3' => 'BYN',
            'numeric' => '933',
            'exp' => 2,
            'country' => 'BY',
        ],
        [
            'name' => 'Belize Dollar',
            'alpha3' => 'BZD',
            'numeric' => '084',
            'exp' => 2,
            'country' => 'BZ',
        ],
        [
            'name' => 'Canadian Dollar',
            'alpha3' => 'CAD',
            'numeric' => '124',
            'exp' => 2,
            'country' => 'CA',
        ],
        [
            'name' => 'Congolese Franc',
            'alpha3' => 'CDF',
            'numeric' => '976',
            'exp' => 2,
            'country' => 'CD',
        ],
        [
            'name' => 'Swiss Franc',
            'alpha3' => 'CHF',
            'numeric' => '756',
            'exp' => 2,
            'country' => [
                'CH',
                'LI',
            ],
        ],
        [
            'name' => 'Chilean Peso',
            'alpha3' => 'CLP',
            'numeric' => '152',
            'exp' => 0,
            'country' => 'CL',
        ],
        [
            'name' => 'Chinese Yuan',
            'alpha3' => 'CNY',
            'numeric' => '156',
            'exp' => 2,
            'country' => 'CN',
        ],
        [
            'name' => 'Colombian Peso',
            'alpha3' => 'COP',
            'numeric' => '170',
            'exp' => 2,
            'country' => 'CO',
        ],
        [
            'name' => 'Costa Rican Colon',
            'alpha3' => 'CRC',
            'numeric' => '188',
            'exp' => 2,
            'country' => 'CR',
        ],
        [
            'name' => 'Cuban Convertible Peso',
            'alpha3' => 'CUC',
            'numeric' => '931',
            'exp' => 2,
            'country' => 'CU',
        ],
        [
            'name' => 'Cuban Peso',
            'alpha3' => 'CUP',
            'numeric' => '192',
            'exp' => 2,
            'country' => 'CU',
        ],
        [
            'name' => 'Cape Verde Escudo',
            'alpha3' => 'CVE',
            'numeric' => '132',
            'exp' => 2,
            'country' => 'CV',
        ],
        [
            'name' => 'Czech Koruna',
            'alpha3' => 'CZK',
            'numeric' => '203',
            'exp' => 2,
            'country' => 'CZ',
        ],
        [
            'name' => 'Djiboutian Franc',
            'alpha3' => 'DJF',
            'numeric' => '262',
            'exp' => 0,
            'country' => 'DJ',
        ],
        [
            'name' => 'Danish Krone',
            'alpha3' => 'DKK',
            'numeric' => '208',
            'exp' => 2,
            'country' => [
                'DK',
                'FO',
                'GL',
            ],
        ],
        [
            'name' => 'Dominican Peso',
            'alpha3' => 'DOP',
            'numeric' => '214',
            'exp' => 2,
            'country' => 'DO',
        ],
        [
            'name' => 'Algerian Dinar',
            'alpha3' => 'DZD',
            'numeric' => '012',
            'exp' => 2,
            'country' => 'DZ',
        ],
        [
            'name' => 'Egyptian Pound',
            'alpha3' => 'EGP',
            'numeric' => '818',
            'exp' => 2,
            'country' => 'EG',
        ],
        [
            'name' => 'Eritrean Nakfa',
            'alpha3' => 'ERN',
            'numeric' => '232',
            'exp' => 2,
            'country' => 'ER',
        ],
        [
            'name' => 'Ethiopian Birr',
            'alpha3' => 'ETB',
            'numeric' => '230',
            'exp' => 2,
            'country' => 'ET',
        ],
        [
            'name' => 'Euro',
            'alpha3' => 'EUR',
            'numeric' => '978',
            'exp' => 2,
            'country' => [
                'AD',
                'AT',
                'AX',
                'BE',
                'BL',
                'CY',
                'DE',
                'EE',
                'ES',
                'FI',
                'FR',
                'GF',
                'GP',
                'GR',
                'IE',
                'IT',
                'LT',
                'LV',
                'LU',
                'MC',
                'ME',
                'MF',
                'MQ',
                'MT',
                'NL',
                'PM',
                'PT',
                'RE',
                'SI',
                'SK',
                'SM',
                'TF',
                'VA',
                'YT',
                'ZW',
            ],
        ],
        [
            'name' => 'Fiji Dollar',
            'alpha3' => 'FJD',
            'numeric' => '242',
            'exp' => 2,
            'country' => 'FJ',
        ],
        [
            'name' => 'Falkland Islands Pound',
            'alpha3' => 'FKP',
            'numeric' => '238',
            'exp' => 2,
            'country' => 'FK',
        ],
        [
            'name' => 'Pound Sterling',
            'alpha3' => 'GBP',
            'numeric' => '826',
            'exp' => 2,
            'country' => [
                'GB',
                'GG',
                'GS',
                'IM',
                'IO',
                'JE',
                'ZW',
            ],
        ],
        [
            'name' => 'Georgian Lari',
            'alpha3' => 'GEL',
            'numeric' => '981',
            'exp' => 2,
            'country' => 'GE',
        ],
        [
            'name' => 'Ghanaian Cedi',
            'alpha3' => 'GHS',
            'numeric' => '936',
            'exp' => 2,
            'country' => 'GH',
        ],
        [
            'name' => 'Gibraltar Pound',
            'alpha3' => 'GIP',
            'numeric' => '292',
            'exp' => 2,
            'country' => 'GI',
        ],
        [
            'name' => 'Gambian Dalasi',
            'alpha3' => 'GMD',
            'numeric' => '270',
            'exp' => 2,
            'country' => 'GM',
        ],
        [
            'name' => 'Guinean Franc',
            'alpha3' => 'GNF',
            'numeric' => '324',
            'exp' => 0,
            'country' => 'GN',
        ],
        [
            'name' => 'Guatemalan Quetzal',
            'alpha3' => 'GTQ',
            'numeric' => '320',
            'exp' => 2,
            'country' => 'GT',
        ],
        [
            'name' => 'Guyanese Dollar',
            'alpha3' => 'GYD',
            'numeric' => '328',
            'exp' => 2,
            'country' => 'GY',
        ],
        [
            'name' => 'Hong Kong Dollar',
            'alpha3' => 'HKD',
            'numeric' => '344',
            'exp' => 2,
            'country' => 'HK',
        ],
        [
            'name' => 'Honduran Lempira',
            'alpha3' => 'HNL',
            'numeric' => '340',
            'exp' => 2,
            'country' => 'HN',
        ],
        [
            'name' => 'Kuna',
            'alpha3' => 'HRK',
            'numeric' => '191',
            'exp' => 2,
            'country' => 'HR',
        ],
        [
            'name' => 'Haitian Gourde',
            'alpha3' => 'HTG',
            'numeric' => '332',
            'exp' => 2,
            'country' => 'HT',
        ],
        [
            'name' => 'Hungarian Forint',
            'alpha3' => 'HUF',
            'numeric' => '348',
            'exp' => 2,
            'country' => 'HU',
        ],
        [
            'name' => 'Indonesian Rupiah',
            'alpha3' => 'IDR',
            'numeric' => '360',
            'exp' => 2,
            'country' => 'ID',
        ],
        [
            'name' => 'Israeli New Sheqel',
            'alpha3' => 'ILS',
            'numeric' => '376',
            'exp' => 2,
            'country' => [
                'IL',
                'PS',
            ],
        ],
        [
            'name' => 'Indian Rupee',
            'alpha3' => 'INR',
            'numeric' => '356',
            'exp' => 2,
            'country' => 'IN',
        ],
        [
            'name' => 'Iraqi Dinar',
            'alpha3' => 'IQD',
            'numeric' => '368',
            'exp' => 3,
            'country' => 'IQ',
        ],
        [
            'name' => 'Iranian Rial',
            'alpha3' => 'IRR',
            'numeric' => '364',
            'exp' => 2,
            'country' => 'IR',
        ],
        [
            'name' => 'Icelandic Króna',
            'alpha3' => 'ISK',
            'numeric' => '352',
            'exp' => 0,
            'country' => 'IS',
        ],
        [
            'name' => 'Jamaican Dollar',
            'alpha3' => 'JMD',
            'numeric' => '388',
            'exp' => 2,
            'country' => 'JM',
        ],
        [
            'name' => 'Jordanian Dinar',
            'alpha3' => 'JOD',
            'numeric' => '400',
            'exp' => 3,
            'country' => 'JO',
        ],
        [
            'name' => 'Japanese Yen',
            'alpha3' => 'JPY',
            'numeric' => '392',
            'exp' => 0,
            'country' => 'JP',
        ],
        [
            'name' => 'Kenyan Shilling',
            'alpha3' => 'KES',
            'numeric' => '404',
            'exp' => 2,
            'country' => 'KE',
        ],
        [
            'name' => 'Kyrgyzstani Som',
            'alpha3' => 'KGS',
            'numeric' => '417',
            'exp' => 2,
            'country' => 'KG',
        ],
        [
            'name' => 'Cambodian Riel',
            'alpha3' => 'KHR',
            'numeric' => '116',
            'exp' => 2,
            'country' => 'KH',
        ],
        [
            'name' => 'Comoro Franc',
            'alpha3' => 'KMF',
            'numeric' => '174',
            'exp' => 0,
            'country' => 'KM',
        ],
        [
            'name' => 'North Korean Won',
            'alpha3' => 'KPW',
            'numeric' => '408',
            'exp' => 2,
            'country' => 'KP',
        ],
        [
            'name' => 'South Korean Won',
            'alpha3' => 'KRW',
            'numeric' => '410',
            'exp' => 0,
            'country' => 'KR',
        ],
        [
            'name' => 'Kuwaiti Dinar',
            'alpha3' => 'KWD',
            'numeric' => '414',
            'exp' => 3,
            'country' => 'KW',
        ],
        [
            'name' => 'Cayman Islands Dollar',
            'alpha3' => 'KYD',
            'numeric' => '136',
            'exp' => 2,
            'country' => 'KY',
        ],
        [
            'name' => 'Kazakhstani Tenge',
            'alpha3' => 'KZT',
            'numeric' => '398',
            'exp' => 2,
            'country' => 'KZ',
        ],
        [
            'name' => 'Lao Kip',
            'alpha3' => 'LAK',
            'numeric' => '418',
            'exp' => 2,
            'country' => 'LA',
        ],
        [
            'name' => 'Lebanese Pound',
            'alpha3' => 'LBP',
            'numeric' => '422',
            'exp' => 2,
            'country' => 'LB',
        ],
        [
            'name' => 'Sri Lankan Rupee',
            'alpha3' => 'LKR',
            'numeric' => '144',
            'exp' => 2,
            'country' => 'LK',
        ],
        [
            'name' => 'Liberian Dollar',
            'alpha3' => 'LRD',
            'numeric' => '430',
            'exp' => 2,
            'country' => 'LR',
        ],
        [
            'name' => 'Lesotho Loti',
            'alpha3' => 'LSL',
            'numeric' => '426',
            'exp' => 2,
            'country' => 'LS',
        ],
        [
            'name' => 'Latvian Lats',
            'alpha3' => 'LVL',
            'numeric' => '428',
            'exp' => 2,
            'country' => 'LV',
        ],
        [
            'name' => 'Libyan Dinar',
            'alpha3' => 'LYD',
            'numeric' => '434',
            'exp' => 3,
            'country' => 'LY',
        ],
        [
            'name' => 'Moroccan Dirham',
            'alpha3' => 'MAD',
            'numeric' => '504',
            'exp' => 2,
            'country' => [
                'EH',
                'MA',
            ],
        ],
        [
            'name' => 'Moldovan Leu',
            'alpha3' => 'MDL',
            'numeric' => '498',
            'exp' => 2,
            'country' => 'MD',
        ],
        [
            'name' => 'Malagasy Ariary',
            'alpha3' => 'MGA',
            'numeric' => '969',
            'exp' => 2,
            'country' => 'MG',
        ],
        [
            'name' => 'Macedonian Denar',
            'alpha3' => 'MKD',
            'numeric' => '807',
            'exp' => 2,
            'country' => 'MK',
        ],
        [
            'name' => 'Myanmar Kyat',
            'alpha3' => 'MMK',
            'numeric' => '104',
            'exp' => 2,
            'country' => 'MM',
        ],
        [
            'name' => 'Mongolian Tugrik',
            'alpha3' => 'MNT',
            'numeric' => '496',
            'exp' => 2,
            'country' => 'MN',
        ],
        [
            'name' => 'Macanese Pataca',
            'alpha3' => 'MOP',
            'numeric' => '446',
            'exp' => 2,
            'country' => 'MO',
        ],
        [
            'name' => 'Mauritanian Ouguiya',
            'alpha3' => 'MRU',
            'numeric' => '929',
            'exp' => 2,
            'country' => 'MR',
        ],
        [
            'name' => 'Mauritian Rupee',
            'alpha3' => 'MUR',
            'numeric' => '480',
            'exp' => 2,
            'country' => 'MU',
        ],
        [
            'name' => 'Maldivian Rufiyaa',
            'alpha3' => 'MVR',
            'numeric' => '462',
            'exp' => 2,
            'country' => 'MV',
        ],
        [
            'name' => 'Malawian Kwacha',
            'alpha3' => 'MWK',
            'numeric' => '454',
            'exp' => 2,
            'country' => 'MW',
        ],
        [
            'name' => 'Mexican Peso',
            'alpha3' => 'MXN',
            'numeric' => '484',
            'exp' => 2,
            'country' => 'MX',
        ],
        [
            'name' => 'Malaysian Ringgit',
            'alpha3' => 'MYR',
            'numeric' => '458',
            'exp' => 2,
            'country' => 'MY',
        ],
        [
            'name' => 'Mozambican Metical',
            'alpha3' => 'MZN',
            'numeric' => '943',
            'exp' => 2,
            'country' => 'MZ',
        ],
        [
            'name' => 'Namibian Dollar',
            'alpha3' => 'NAD',
            'numeric' => '516',
            'exp' => 2,
            'country' => 'NA',
        ],
        [
            'name' => 'Nigerian Naira',
            'alpha3' => 'NGN',
            'numeric' => '566',
            'exp' => 2,
            'country' => 'NG',
        ],
        [
            'name' => 'Nicaraguan Córdoba',
            'alpha3' => 'NIO',
            'numeric' => '558',
            'exp' => 2,
            'country' => 'NI',
        ],
        [
            'name' => 'Norwegian Krone',
            'alpha3' => 'NOK',
            'numeric' => '578',
            'exp' => 2,
            'country' => [
                'AQ',
                'BV',
                'NO',
                'SJ',
            ],
        ],
        [
            'name' => 'Nepalese Rupee',
            'alpha3' => 'NPR',
            'numeric' => '524',
            'exp' => 2,
            'country' => 'NP',
        ],
        [
            'name' => 'New Zealand Dollar',
            'alpha3' => 'NZD',
            'numeric' => '554',
            'exp' => 2,
            'country' => [
                'CK',
                'NU',
                'NZ',
                'PN',
                'TK',
            ],
        ],
        [
            'name' => 'Omani Rial',
            'alpha3' => 'OMR',
            'numeric' => '512',
            'exp' => 3,
            'country' => 'OM',
        ],
        [
            'name' => 'Panamanian Balboa',
            'alpha3' => 'PAB',
            'numeric' => '590',
            'exp' => 2,
            'country' => 'PA',
        ],
        [
            'name' => 'Peruvian Nuevo Sol',
            'alpha3' => 'PEN',
            'numeric' => '604',
            'exp' => 2,
            'country' => 'PE',
        ],
        [
            'name' => 'Papua New Guinean Kina',
            'alpha3' => 'PGK',
            'numeric' => '598',
            'exp' => 2,
            'country' => 'PG',
        ],
        [
            'name' => 'Philippine Peso',
            'alpha3' => 'PHP',
            'numeric' => '608',
            'exp' => 2,
            'country' => 'PH',
        ],
        [
            'name' => 'Pakistani Rupee',
            'alpha3' => 'PKR',
            'numeric' => '586',
            'exp' => 2,
            'country' => 'PK',
        ],
        [
            'name' => 'Polish Zloty',
            'alpha3' => 'PLN',
            'numeric' => '985',
            'exp' => 2,
            'country' => 'PL',
        ],
        [
            'name' => 'Paraguayan Guarani',
            'alpha3' => 'PYG',
            'numeric' => '600',
            'exp' => 0,
            'country' => 'PY',
        ],
        [
            'name' => 'Qatari Rial',
            'alpha3' => 'QAR',
            'numeric' => '634',
            'exp' => 2,
            'country' => 'QA',
        ],
        [
            'name' => 'Romanian Leu',
            'alpha3' => 'RON',
            'numeric' => '946',
            'exp' => 2,
            'country' => 'RO',
        ],
        [
            'name' => 'Serbian Dinar',
            'alpha3' => 'RSD',
            'numeric' => '941',
            'exp' => 2,
            'country' => 'RS',
        ],
        [
            'name' => 'Russian Ruble',
            'alpha3' => 'RUB',
            'numeric' => '643',
            'exp' => 2,
            'country' => 'RU',
        ],
        [
            'name' => 'Rwandan Franc',
            'alpha3' => 'RWF',
            'numeric' => '646',
            'exp' => 0,
            'country' => 'RW',
        ],
        [
            'name' => 'Saudi Riyal',
            'alpha3' => 'SAR',
            'numeric' => '682',
            'exp' => 2,
            'country' => 'SA',
        ],
        [
            'name' => 'Solomon Islands Dollar',
            'alpha3' => 'SBD',
            'numeric' => '090',
            'exp' => 2,
            'country' => 'SB',
        ],
        [
            'name' => 'Seychelles Rupee',
            'alpha3' => 'SCR',
            'numeric' => '690',
            'exp' => 2,
            'country' => 'SC',
        ],
        [
            'name' => 'Sudanese Pound',
            'alpha3' => 'SDG',
            'numeric' => '938',
            'exp' => 2,
            'country' => 'SD',
        ],
        [
            'name' => 'Swedish Krona',
            'alpha3' => 'SEK',
            'numeric' => '752',
            'exp' => 2,
            'country' => 'SE',
        ],
        [
            'name' => 'Singapore Dollar',
            'alpha3' => 'SGD',
            'numeric' => '702',
            'exp' => 2,
            'country' => [
                'BN',
                'SG',
            ],
        ],
        [
            'name' => 'Saint Helena Pound',
            'alpha3' => 'SHP',
            'numeric' => '654',
            'exp' => 2,
            'country' => 'SH',
        ],
        [
            'name' => 'Sierra Leonean Leone',
            'alpha3' => 'SLL',
            'numeric' => '694',
            'exp' => 2,
            'country' => 'SL',
        ],
        [
            'name' => 'Somali Shilling',
            'alpha3' => 'SOS',
            'numeric' => '706',
            'exp' => 2,
            'country' => 'SO',
        ],
        [
            'name' => 'Surinamese Dollar',
            'alpha3' => 'SRD',
            'numeric' => '968',
            'exp' => 2,
            'country' => 'SR',
        ],
        [
            'name' => 'South Sudanese Pound',
            'alpha3' => 'SSP',
            'numeric' => '728',
            'exp' => 2,
            'country' => 'SS',
        ],
        [
            'name' => 'São Tomé and Principe Dobra',
            'alpha3' => 'STN',
            'numeric' => '930',
            'exp' => 2,
            'country' => 'ST',
        ],
        [
            'name' => 'Syrian Pound',
            'alpha3' => 'SYP',
            'numeric' => '760',
            'exp' => 2,
            'country' => 'SY',
        ],
        [
            'name' => 'Swazi Lilangeni',
            'alpha3' => 'SZL',
            'numeric' => '748',
            'exp' => 2,
            'country' => 'SZ',
        ],
        [
            'name' => 'Thai Baht',
            'alpha3' => 'THB',
            'numeric' => '764',
            'exp' => 2,
            'country' => 'TH',
        ],
        [
            'name' => 'Tajikistani Somoni',
            'alpha3' => 'TJS',
            'numeric' => '972',
            'exp' => 2,
            'country' => 'TJ',
        ],
        [
            'name' => 'Turkmenistani Manat',
            'alpha3' => 'TMT',
            'numeric' => '934',
            'exp' => 2,
            'country' => 'TM',
        ],
        [
            'name' => 'Tunisian Dinar',
            'alpha3' => 'TND',
            'numeric' => '788',
            'exp' => 3,
            'country' => 'TN',
        ],
        [
            'name' => 'Tongan Paʻanga',
            'alpha3' => 'TOP',
            'numeric' => '776',
            'exp' => 2,
            'country' => 'TO',
        ],
        [
            'name' => 'Turkish Lira',
            'alpha3' => 'TRY',
            'numeric' => '949',
            'exp' => 2,
            'country' => 'TR',
        ],
        [
            'name' => 'Trinidad and Tobago Dollar',
            'alpha3' => 'TTD',
            'numeric' => '780',
            'exp' => 2,
            'country' => 'TT',
        ],
        [
            'name' => 'New Taiwan Dollar',
            'alpha3' => 'TWD',
            'numeric' => '901',
            'exp' => 2,
            'country' => 'TW',
        ],
        [
            'name' => 'Tanzanian Shilling',
            'alpha3' => 'TZS',
            'numeric' => '834',
            'exp' => 2,
            'country' => 'TZ',
        ],
        [
            'name' => 'Ukrainian Hryvnia',
            'alpha3' => 'UAH',
            'numeric' => '980',
            'exp' => 2,
            'country' => 'UA',
        ],
        [
            'name' => 'Ugandan Shilling',
            'alpha3' => 'UGX',
            'numeric' => '800',
            'exp' => 0,
            'country' => 'UG',
        ],
        [
            'name' => 'US Dollar',
            'alpha3' => 'USD',
            'numeric' => '840',
            'exp' => 2,
            'country' => [
                'AS',
                'BQ',
                'EC',
                'FM',
                'GU',
                'MF',
                'MH',
                'MP',
                'PR',
                'PW',
                'SV',
                'TC',
                'TL',
                'UM',
                'US',
                'VG',
                'VI',
                'ZW',
            ],
        ],
        [
            'name' => 'Uruguayan Peso',
            'alpha3' => 'UYU',
            'numeric' => '858',
            'exp' => 2,
            'country' => 'UY',
        ],
        [
            'name' => 'Uzbekistan Som',
            'alpha3' => 'UZS',
            'numeric' => '860',
            'exp' => 2,
            'country' => 'UZ',
        ],
        [
            'name' => 'Venezuelan Bolívar',
            'alpha3' => 'VES',
            'numeric' => '928',
            'exp' => 2,
            'country' => 'VE',
        ],
        [
            'name' => 'Vietnamese Dong',
            'alpha3' => 'VND',
            'numeric' => '704',
            'exp' => 0,
            'country' => 'VN',
        ],
        [
            'name' => 'Vanuatu Vatu',
            'alpha3' => 'VUV',
            'numeric' => '548',
            'exp' => 0,
            'country' => 'VU',
        ],
        [
            'name' => 'Samoan Tala',
            'alpha3' => 'WST',
            'numeric' => '882',
            'exp' => 2,
            'country' => 'WS',
        ],
        [
            'name' => 'CFA Franc BEAC',
            'alpha3' => 'XAF',
            'numeric' => '950',
            'exp' => 0,
            'country' => [
                'CF',
                'CG',
                'CM',
                'GA',
                'GQ',
                'TD',
            ],
        ],
        [
            'name' => 'East Caribbean Dollar',
            'alpha3' => 'XCD',
            'numeric' => '951',
            'exp' => 2,
            'country' => [
                'AG',
                'AI',
                'DM',
                'GD',
                'KN',
                'LC',
                'MS',
                'VC',
            ],
        ],
        [
            'name' => 'CFA Franc BCEAO',
            'alpha3' => 'XOF',
            'numeric' => '952',
            'exp' => 0,
            'country' => [
                'BJ',
                'BF',
                'CI',
                'GW',
                'ML',
                'NE',
                'SN',
                'TG',
            ],
        ],
        [
            'name' => 'CFP Franc',
            'alpha3' => 'XPF',
            'numeric' => '953',
            'exp' => 0,
            'country' => [
                'NC',
                'PF',
                'WF',
            ],
        ],
        [
            'name' => 'Yemeni Rial',
            'alpha3' => 'YER',
            'numeric' => '886',
            'exp' => 2,
            'country' => 'YE',
        ],
        [
            'name' => 'South African Rand',
            'alpha3' => 'ZAR',
            'numeric' => '710',
            'exp' => 2,
            'country' => [
                'NA',
                'LS',
                'SZ',
                'ZA',
                'ZW',
            ],
        ],
        [
            'name' => 'Zambian Kwacha',
            'alpha3' => 'ZMW',
            'numeric' => '967',
            'exp' => 2,
            'country' => 'ZM',
        ],
    ];
}
