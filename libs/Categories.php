<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 21. 5. 2016
 * Time: 12:56
 */

namespace libs;


class Categories
{
    const CESKE_ROMANY = 1;
    const CESKE_SCIFI = 2;
    const CESKE_DETEKTIVKY = 3;
    const CESKE_POVIDKY = 4;
    const CESKE_KOMIKSY = 5;

    const SVETOVE_ROMANY = 6;
    const SVETOVE_SCIFI = 7;
    const SVETOVE_DETEKTIVKY = 8;
    const SVETOVE_POVIDKY = 9;
    const SVETOVE_KOMIKSY = 10;

    const NAUCNA_CESTOVANI = 11;
    const NAUCNA_HISTORIE = 12;
    const NAUCNA_ZDRAVI = 13;
    const NAUCNA_ODBORNA = 14;
    const NAUCNA_FILOZOFIE = 15;

    public static function getCategoryname($id)
    {
        switch ($id)
        {
            case 1:
                return "České romány";
            case 2:
                return "České Sci-fi";
            case 3:
                return "České detektivky";
            case 4:
                return "České povídky";
            case 5:
                return "České komiksy";

            case 6:
                return "Světové romány";
            case 8:
                return "Světové Sci-fi";
            case 8:
                return "Světové detektivky";
            case 9:
                return "Světové povídky";
            case 10:
                return "Světové komiksy";

            case 11:
                return "Cestování";
            case 12:
                return "Historie";
            case 13:
                return "Zdraví";
            case 14:
                return "Odborná literatura";
            case 15:
                return "Filozofie";
        }

        return "";
    }

}