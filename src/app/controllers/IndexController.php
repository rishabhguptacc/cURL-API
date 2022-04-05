<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        
        
    
    }

    public function searchBookAction()
    {
        // $text =  $this->request->getpost()['search'];
        $text =  $this->request->getpost('search');

        $text = strtolower($text);
        $brkText = explode(' ', $text);
        $urlFmt = implode('+', $brkText);



        print_r($urlFmt);

        $url = "https://openlibrary.org/search.json?q=".$urlFmt."&mode=ebooks&has_fulltext=true";
        
        // Initialize a CURL session.
        $ch = curl_init();

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $response = json_decode($response);
        $this->view->response = $response;
        
        $num = $response->numFound;
        $bookList = $response->docs;
        $this->view->bookList = $bookList;

        echo "<br><pre>";
        // print_r($bookList[0]);
       
        // print_r($urlBookTitle);

        for ($x = 0; $x < $num; $x++) {
            // print_r($bookList[$x]->title);
            
?>

        <div class="card" style="width: 18rem;">
        <a href="">
        <img src="//covers.openlibrary.org/b/olid/<?= $bookList[$x]->lending_edition_s ?>-M.jpg" class="card-img-top" alt="Cover of <?= $bookList[$x]->title ?> ">
        </a>
        <div class="card-body">
            <p class="card card-text"> <h3><?= $bookList[$x]->title ?> </h3>  </p>
            <p class="card card-text"> by <b><?= $bookList[$x]->author_name[0] ?> </b>  </p>
            <p class="card card-text"> First published in <?= $bookList[$x]->first_publish_year ?> </p>
            <p class="card-text"> <?= $bookList[$x]->edition_count ?> <?php if ($bookList[$x]->edition_count == 1){ ?> edition <?php } else {?> editions <?php } if(isset($bookList[$x]->ia_box_id)) { ?> --- <?= count($bookList[$x]->ia_box_id); ?> previewable</p> <?php } ?>
            <a href="https://www.google.co.in/books/edition/<?= $urlFmt ?>/<?= $bookList[$x]->id_google[0] ?>?hl=en " class="btn btn-primary">Google Link</a>
            <a href="https://www.google.co.in/books/edition/<?= $urlFmt ?>/<?= $bookList[$x]->id_amazon[0] ?>?hl=en " class="btn btn-primary">Amazon Link</a>
        </div>
        </div>
<?php
        }
        // print_r();
        die;
    }
}

