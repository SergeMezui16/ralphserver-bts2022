<?php
namespace RalphServer\Entities;

/**
 * Permet de manipuler les differents droits attibués a un fichier
 * Ces droits sont defini par quatre parametres boleens
 * @var bool $visibility Defini le status d'un droit, public ou prive
 * @var bool $owner Accessibilité du groupe du proprietaire
 * @var bool $upper Accessibilité des groupes superieur a celui du proprietaire
 * @var bool $lower Accessibilité des groupes infereurs a celui du proprietaire
 * 
 * @author Serge Mezui 
 */
class Right {

    private $visibility;
    private $owner;
    private $upper;
    private $lower;

    /**
     * Permet de manipuler les differents droits attibués a un fichier
     * Ces droits sont defini par quatre parametres boleens
     * @param bool $visibility Defini le status d'un droit, public ou prive
     * @param bool $owner Accessibilité du groupe du proprietaire
     * @param bool $upper Accessibilité des groupes superieur a celui du proprietaire
     * @param bool $lower Accessibilité des groupes infereurs a celui du proprietaire
     * 
     * @author Serge Mezui 
     */
    public function __construct(bool $visibility, bool $owner, bool $upper, bool $lower)
    {
        $this->visibility = $visibility;
        $this->owner = $owner;
        $this->upper = $upper;
        $this->lower = $lower;
    }

    public function toString() : string
    {
        $r = '';

        $r .= ($this->visibility) ? '1' : '0';
        $r .= ($this->owner) ? '1' : '0';
        $r .= ($this->upper) ? '1' : '0';
        $r .= ($this->lower) ? '1' : '0';

        return $r;
    }

    /**
     * Recuperer le 
     */
    public static function getRight(string $code) : self
    {

        for ($i=1 ; $i <= strlen($code); $i++) { 
            $tab[$i] = substr($code, $i-1, 1);
        }

        $visibility = ($tab[1]) ? true : false;
        $owner  = ($tab[2]) ? true : false;
        $upper = ($tab[3]) ? true : false;
        $lower = ($tab[4]) ? true : false;

        return new Right($visibility, $owner, $upper, $lower);
    }

}

$right = new Right(true, true, false, false);

echo $right->toString();

var_dump(Right::getRight('1001'));