<?php
/**
 * Created by PhpStorm.
 * User: s.halin
 * Date: 13/02/2018
 * Time: 14:07
 */

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article",inversedBy="comments", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * article constructor.
     * @param $title
     * @param $content
     */
    public function __construct($content, $article, $autor)
    {
        $this->setDate(new \DateTime('now'));
        $this->setContent($content);
        $this->setArticle($article);
        $this->setAutor($autor);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set article
     *
     * @param \AppBundle\Entity\Article $article
     *
     * @return Comment
     */
    public function setArticle(Article $article)
    {
        if ($article == null){
            throw new NotFoundHttpException("Article est null");
        }
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \AppBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set autor
     *
     * @param string $autor
     *
     * @return Comment
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }
}
