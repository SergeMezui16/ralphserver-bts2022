<?php
namespace RalphServer\Helpers;

use DateTime;


class DateFormat {

    // fonction pour recuperer la date d'une BD et la decoupe
    public static function tab_date(string $date) : array
    {
        // format de $date : 'Y/m/d H:i:s'

        // coupe le premier tableau
        $tab = explode(' ', $date);
        // decoupe le second tableau
        $date_tab = $tab[0];
        $hour_tab = $tab[1];

        // retourne le tableau decoupé
        $new_tab = [
            'year' => explode('-', $date_tab)[0],
            'month' => explode('-', $date_tab)[1],
            'day' => explode('-', $date_tab)[2],
            'hour' => explode(':', $hour_tab)[0],
            'minute' => explode(':', $hour_tab)[1],
            'seconde' => explode(':', $hour_tab)[2]
        ];

        if(isset($new_tab) && !empty($new_tab)){
            return $new_tab;
        }else{ 
            return null;
        }
    }  
    
    public static function stringDate(string $date) : string{
        $date = self::tab_date($date);
    
        return $date['day'].'/'.$date['month'].'/'.$date['year'];
    }

    public static function countedDate(string $date = '') : string{
        // format de $date : 'Y/m/d H:i:s'
    
        // on prend le fuseau horaire de Libreville
        date_default_timezone_set('Africa/Libreville');
    
        // cree une nouvelle date
        $date = new DateTime($date);
        // recuperer la duree
        $period = time() - $date->getTimestamp();
        // calcul des données
        $p_minute = $period/60;
        $p_hour = $p_minute/60;
        $p_day = $p_hour/24;
        $p_month = $p_day/30;
        $p_year = $p_day/365;
    
        // Message
        $mess = '';
    
        // conditions
        if($period < 0){ $mess = $mess . '-';}
        elseif($period < 60){$mess = $mess . floor($period) .' secondes';} // secondes
        elseif($period < 3600){ // minutes
            $mess = $mess . floor($p_minute) . ' minute';
            if(floor($p_minute) > 1){$mess = $mess . 's';} // si c'est au pluriel
        }
        elseif($period < 86400){ // heures
            $mess = $mess . floor($p_hour) . ' heure';
            if(floor($p_hour) > 1){$mess = $mess . 's';} // si c'est au pluriel
        }
        elseif($period < 2592000){ // jours
            $mess = $mess . floor($p_day) . ' jour';
            if(floor($p_day) > 1){$mess = $mess . 's';} // si c'est au pluriel
        }
        elseif($period < 946080000){ // mois
            $mess = $mess . floor($p_month) . ' mois';
        }
        elseif($period > 946080000){ // annees
            $mess = $mess . floor($p_year) . ' an';
            if(floor($p_year) > 1){ $mess = $mess . 'nées';} // si c'est au pluriel
        }
    
        return $mess;
    } 

    public static function dateToString(string $date, int $format = 1) : string {
        // format de $date : 'Y/m/d H:i:s'
    
        // tableau des jours et mois en francais
        $days = [1 => 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.', 'Dim.'];
        $months = [1 => 'Jan.', 'Fev.', 'Mar.', 'Avr.', 'Mai', 'Juin', 'Juillet', 'Aout', 'Sep.', 'Oct.', 'Nov.', 'Dec.'];
    
        // cree une nouvelle date
        $dt = new DateTime($date);
    
        // recupere le numero du jour de la semaine
        $day_num = strftime('%u', $dt->getTimestamp());
    
        // recupere les parties de la date
        $day = self::tab_date($date)['day'];
        $month = intval(self::tab_date($date)['month']);
        $year = self::tab_date($date)['year'];
        $hour = self::tab_date($date)['hour'];
        $minute = self::tab_date($date)['minute'];
    
        switch($format){
            case 1: return $days[$day_num] .' '.$day.' '.$months[$month] . ' ' .$year .' à ' .$hour. 'H' . $minute;
                break;
            
            case 2: return $day .'/'. $month .'/'. $year .' • '. $hour. 'H' . $minute;
                break;
    
            default : return $days[$day_num] .', le '.$day.' '.$months[$month] . ' ' .$year .' à ' .$hour. 'H' . $minute;
                break;
        }
    }


    public static function isNoel(){
        return date('d') == '25' && date('m') == '12' ? true : false;
    }
    
    public static function isNoelPeriod(){
        return date('m') == '12' ? true : false;
    }
}
