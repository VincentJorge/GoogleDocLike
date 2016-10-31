<?php

class Homes extends Controller
{
	public $model;

	public function __construct() {
		$this->load_model('Home');
		$this->model = new Home();
	}

	public function index()
	{		
		$this->render('index');
	}

	public function upload_file() {
		$dossier = 'Assets/Uploads/';
		$fichier = basename($_FILES['avatar']['name']);
		$file = array();
		$files['name'] = $_FILES['avatar']['name'];
		$files['type'] = $_FILES['avatar']['type'];
		$files['size'] = $_FILES['avatar']['size'];
		$files['paths'] = "Assets/Uploads/" .$files['name'];
		$ext = explode('.', $files['name']);
		$files['ext'] =  $ext[(count($ext)-1)];
    if (!$this->model->check_name($files['name'])) {
		    $this->model->upload($files);
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
        	$data['success'] = 'success';
        	$data['name'] = $files['name'];
        	$this->set($data);
        	$this->render('index');
        	exit;
        }
        else {
        	$data['error'] = 'error';
        	$this->set($data);
        	$this->render('index');
        }
    }
    else{
      $data['error2'] = 'error2';
      $data['name'] = $files['name'];
      $this->set($data);
      $this->render('index');
    }
  }
      public function send_file(){
       $fichier = $_POST['content_area']; 
       $ouverture = file_get_contents(WEBROOT . "Assets/Uploads/" .$fichier);
       $data['fichier'] = $ouverture;
       $data['name'] = $fichier;
       $this->set($data);
       $this->render('index');
     }
/*   public function create_file()
   {
    $title = $_POST['doctitle'];
    $content = $_POST['Contentdoc'];
    $myfile = fopen("Assets/Newdoc/".$title.".mywac", "w");
    fwrite($myfile, $content);
    move_uploaded_file($myfile, 'WacDoc/Assets/Newdoc');
      header('Location: ' . WEBROOT . 'Homes/index');
    }*/
  }