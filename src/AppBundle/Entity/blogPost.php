<?php
/**
 * Created by PhpStorm.
 * User: s.halin
 * Date: 12/02/2018
 * Time: 17:17
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class blogPost
 * @package AppBundle\Entity
 * @ORM\Table(name="blogPost")
 */
class blogPost
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;
    /**
     * @ORM\Column(name="content", type="text")
     */
    protected $content;
    /**
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

    public function __construct($title,$content)
    {
        $this->setDate(new \Datetime());
        $this->setTitle($title);
        $this->setContent($content);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}