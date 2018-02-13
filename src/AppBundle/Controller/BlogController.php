<?php

namespace AppBundle\Controller;

use AppBundle\Entity\article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $articlesAndComments = $this->getDoctrine()->getManager()->getRepository('AppBundle:Article')->getArticleWithComments();
        /*$articles = array(
            array('id' => 1, 'title' => 'Lorem ipsum dolor sit amet.', 'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper, urna sit amet ornare vehicula, augue mi scelerisque libero, imperdiet tristique arcu mauris et augue. Suspendisse potenti. Quisque sit amet tincidunt elit, ac pharetra elit. Integer ut imperdiet tortor, quis suscipit mi. Praesent vestibulum eleifend augue sit amet vehicula. In ultricies efficitur lorem quis venenatis. In ac arcu congue, gravida lacus condimentum, tempus tellus. Sed auctor mi risus, et vehicula est ultrices ac. Suspendisse tincidunt, ipsum ac iaculis tincidunt, magna nunc fermentum tellus, vel commodo urna ipsum a ligula. Nulla ullamcorper libero eros, ac condimentum ligula laoreet id.'),
            array('id' => 2, 'title' => 'Vestibulum tincidunt lectus in mi', 'text'=>'Cras auctor accumsan tortor ut pulvinar. Vestibulum velit neque, vulputate in eros nec, ornare sodales augue. Ut lobortis dolor at nibh accumsan, et varius mauris ultricies. Sed eu diam laoreet, pulvinar elit eget, iaculis dolor. Ut ornare arcu id varius ullamcorper. Nam nulla magna, commodo at ultricies et, facilisis id ipsum. Donec accumsan ipsum non consectetur interdum. Vestibulum sagittis ut nisl ut maximus.'),
            array('id' => 3, 'title' => 'Pellentesque ultricies suscipit dignissim', 'text'=>'Duis eget lectus ac odio pharetra fringilla at vel lorem. Fusce nec fringilla urna. Aliquam lobortis metus imperdiet, ultrices libero vitae, pellentesque velit. Aliquam aliquet, velit ac consequat porta, mauris dolor eleifend neque, ut iaculis nisi quam eu nulla. Cras at justo sit amet turpis cursus eleifend eget vel orci. Maecenas congue purus in lorem placerat ornare. In vehicula eu purus eu venenatis.')
        );*/

        return $this->render('@App/blog.html.twig', array('articles' => $articlesAndComments));
    }
    /**
     * @Route("/article/{id}",requirements={"id"="\d+"})
     */
    public function showArticle($id){
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->find($id);

        if ($article==null){
            throw new NotFoundHttpException("Cet article n'existe pas.");
        }

        $comments=$em->getRepository('AppBundle:Comment')->findBy(array('article'=>$article));

        return $this->render('@App/article.html.twig', array('article' => $article, 'comments'=>$comments));
    }

    /**
     * @Route("add")
     */
    public function addArticle(Request $request){
        /*$article = new Article('Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper, urna sit amet ornare vehicula, augue mi scelerisque libero, imperdiet tristique arcu mauris et augue. Suspendisse potenti. Quisque sit amet tincidunt elit, ac pharetra elit. Integer ut imperdiet tortor, quis suscipit mi. Praesent vestibulum eleifend augue sit amet vehicula. In ultricies efficitur lorem quis venenatis. In ac arcu congue, gravida lacus condimentum, tempus tellus. Sed auctor mi risus, et vehicula est ultrices ac. Suspendisse tincidunt, ipsum ac iaculis tincidunt, magna nunc fermentum tellus, vel commodo urna ipsum a ligula. Nulla ullamcorper libero eros, ac condimentum ligula laoreet id.');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();*/

        $messages = array();

        if($request->isMethod('POST')) {
            array_push($messages, 'Article correctement enregistré');
        }
        return $this->render('@App/addArticle.html.twig',array('messages' => $messages));
    }
}