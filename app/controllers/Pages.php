<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){

      if (isLoggedIn()) {
        redirect('posts');
    }
    
      $data = [
        'title' => 'SharePosts',
        'description'=> 'Simple simple social media network built on the custom PHP framework'
        
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description'=> 'Apps to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
  }