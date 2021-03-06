<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="pf_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Country")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $country;

    /**
    * @ORM\ManyToOne(targetEntity="PlayoffBundle\Entity\Team")
    * @ORM\JoinColumn(nullable=true)
    */
    protected $favoriteTeam;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=5, nullable=true)
     */
    protected $locale;

    /**
    * @ORM\ManyToMany(targetEntity="FantasyBundle\Entity\League", mappedBy="users")
    */
    protected $leagues;


    public function __construct()
    {
        parent::__construct();
        $this->leagues = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return User
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Add league
     *
     * @param \FantasyBundle\Entity\League $league
     *
     * @return User
     */
    public function addLeague(\FantasyBundle\Entity\League $league)
    {
        $this->leagues[] = $league;

        return $this;
    }

    /**
     * Remove league
     *
     * @param \FantasyBundle\Entity\League $league
     */
    public function removeLeague(\FantasyBundle\Entity\League $league)
    {
        $this->leagues->removeElement($league);
    }

    /**
     * Get leagues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeagues()
    {
        return $this->leagues;
    }


    /**
     * Set favoriteTeam
     *
     * @param \PlayoffBundle\Entity\Team $favoriteTeam
     *
     * @return User
     */
    public function setFavoriteTeam(\PlayoffBundle\Entity\Team $favoriteTeam = null)
    {
        $this->favoriteTeam = $favoriteTeam;

        return $this;
    }

    /**
     * Get favoriteTeam
     *
     * @return \PlayoffBundle\Entity\Team
     */
    public function getFavoriteTeam()
    {
        return $this->favoriteTeam;
    }
}
