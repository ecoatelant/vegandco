<?php

require_once 'vue_blog.php';
require_once 'modele_blog.php';

class ContBlog {

    public $modeleBlog;
    public $vueBlog;

    public function __construct() {
		$this->modeleBlog = new  ModeleBlog();
        $this->vueBlog = new VueBlog();
    }

    public function afficherBlog($idBlog){
        $blog = $this->modeleBlog->getBlog($idBlog);
        $this->vueBlog->afficherBlog($blog);
    }

    public function listeBlog() {
        $listesBlog = $this->modeleBlog->getListeBlog();
        $this->vueBlog->afficherBlogs($listesBlog);
    }

}
