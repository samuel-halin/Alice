<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $listPosts = array(
            array('id' => 1, 'title' => 'Lorem ipsum dolor sit amet.', 'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper, urna sit amet ornare vehicula, augue mi scelerisque libero, imperdiet tristique arcu mauris et augue. Suspendisse potenti. Quisque sit amet tincidunt elit, ac pharetra elit. Integer ut imperdiet tortor, quis suscipit mi. Praesent vestibulum eleifend augue sit amet vehicula. In ultricies efficitur lorem quis venenatis. In ac arcu congue, gravida lacus condimentum, tempus tellus. Sed auctor mi risus, et vehicula est ultrices ac. Suspendisse tincidunt, ipsum ac iaculis tincidunt, magna nunc fermentum tellus, vel commodo urna ipsum a ligula. Nulla ullamcorper libero eros, ac condimentum ligula laoreet id.'),
            array('id' => 2, 'title' => 'Vestibulum tincidunt lectus in mi', 'text'=>'Cras auctor accumsan tortor ut pulvinar. Vestibulum velit neque, vulputate in eros nec, ornare sodales augue. Ut lobortis dolor at nibh accumsan, et varius mauris ultricies. Sed eu diam laoreet, pulvinar elit eget, iaculis dolor. Ut ornare arcu id varius ullamcorper. Nam nulla magna, commodo at ultricies et, facilisis id ipsum. Donec accumsan ipsum non consectetur interdum. Vestibulum sagittis ut nisl ut maximus.'),
            array('id' => 3, 'title' => 'Pellentesque ultricies suscipit dignissim', 'text'=>'Duis eget lectus ac odio pharetra fringilla at vel lorem. Fusce nec fringilla urna. Aliquam lobortis metus imperdiet, ultrices libero vitae, pellentesque velit. Aliquam aliquet, velit ac consequat porta, mauris dolor eleifend neque, ut iaculis nisi quam eu nulla. Cras at justo sit amet turpis cursus eleifend eget vel orci. Maecenas congue purus in lorem placerat ornare. In vehicula eu purus eu venenatis.')
        );

        return $this->render('@App/index.html.twig', array('listPosts' => $listPosts));
    }
}
