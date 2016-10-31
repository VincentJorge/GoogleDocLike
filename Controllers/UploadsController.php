<?php 
class Uploads extends Controller {

  public $model;

  public function __construct() {
    $this->load_model('Upload');
    $this->model = new Upload();
  }
  public function create()
  {
    $this->render('newdoc');
  }
  public function newdoc()
  {
    $create = array();
    $create['name'] = $_POST['doctitle'] .".mywac";
    $create['type'] = "text/plain";
    $create['size'] = "0";
    $create['paths'] = "Assets/Newdoc/" .$create['name'];
    $create['ext'] =  "mywac";
    $content = $_POST['Contentdoc'];
    if (!$this->model->check_name($create['name'])) {
      $this->model->insert_Create($create);
      $title = $_POST['doctitle'];
      $myfile = fopen("Assets/Newdoc/".$title.".mywac", "w");
      fwrite($myfile, $content);
      move_uploaded_file($myfile, 'WacDoc/Upload');
      echo "Votre fichier est crée.";
      header('Location: ' . WEBROOT . 'Uploads/create');
    }
    else{
      $data['error2'] = 'error2';
      $data['name'] = $create['name'];
      $data['content'] = $content;
      $this->set($data);
      $this->render('newdoc');
    }
  }
  public function getList(){
    $data['uploads'] = $this->model->get_list();
    $this->set($data);
    $this->render('uploadslist');
  }
  public function getCreate(){
    $data['create'] = $this->model->get_create();
    $this->set($data);
    $this->render('createlist');
  }

  public function edit($id){
    $info = $this->model->get_file($id);
    $fichier = $info[0]['name']; 
    $typ = explode('/', $info[0]['type']);
    $ouverture = file_get_contents("Assets/Uploads/" .$fichier);
    $data['fichier'] = $ouverture;
    $data['content'] = $ouverture;
    $data['name'] = $fichier;
    $data['id'] = $info[0]['id'];
    $data['size'] = $info[0]['size'];
    $data['type'] = $info[0]['type'];
    $data['typ'] = $typ[0];
    $this->set($data);
    $this->render('edit');
  }
  public function edit_create($id){
    $info = $this->model->get_spc_create($id);
    $fichier = $info[0]['name']; 
    $ouverture = file_get_contents("Assets/Newdoc/" .$fichier);
    $data['fichier'] = $ouverture;
    $data['content'] = $ouverture;
    $data['name'] = $fichier;
    $data['id'] = $info[0]['id'];
    $data['size'] = $info[0]['size'];
    $this->set($data);
    $this->render('editcreate');
  }
  public function download($name = null){
    header('Content-Transfer-Encoding: binary'); 
    header('Content-Disposition: attachment; filename="'
      .$name.'"');
    readfile(ROOT . "/Assets/Uploads/"  .$name);
  }

  public function delete($id, $name)
  {
   $this->model->del_file($id);
   unlink(ROOT . "Assets/Uploads/" .$name); 
   header('Location: ' . WEBROOT . 'Uploads/getList');
 }
 public function delete_create($id, $name)
 {
   $this->model->del_create($id); 
   unlink(ROOT . "Assets/Newdoc/" .$name); 
   header('Location: ' . WEBROOT . 'Uploads/getCreate');
 }
 public function modif_file($id, $size, $name) {
  $data['uploads'] = $this->model->get_list();
  $this->set($data);
      // if (!empty($_POST['content_area'])) {
       $fichier= $_POST['title']; // Nom du fichier 
       $file['name'] = $fichier;
       $file['id'] = $id;
       $file['size'] = $size;
       $infos = $this->model->get_file($file['id']);
       $typ = explode('/', $infos[0]['type']);
       if (!$this->model->check_name_file_modif($file['name'], $file['id'])) {
         rename(ROOT . "/Assets/Uploads/" .$name, 
          ROOT . "/Assets/Uploads/" .$fichier);
         $info = $this->model->update_file($file);
         $ouverture = fopen("Assets/Uploads/" .$fichier ,"w"); // Création du nouveau fichier et ouverture du fichier avec le mode w on ouvre le fichier qu'en écriture et unlink devient inutile car le fichier est vidé automatiquement
         if ($typ[0] === 'text') {
          fwrite($ouverture,$_POST['register']); // ecriture
        }
         fclose($ouverture); // fermeture du fichier
         $data['success'] = 'success';
         $data['name'] = $file['name'];
         $this->set($data);
         $this->render('uploadslist');
         exit;
       }
       else{
        $ouverture = file_get_contents("Assets/Uploads/" .$name);
        $data['error2'] = 'error2';
        $data['name'] = $file['name'];
        $data['id'] = $id;
        $data['size'] = $size;
        $data['content'] = $ouverture;
        $this->set($data);
        $this->render('edit');
      }
       // echo getcwd();
     // }
   // }
    }
    public function modif_create($id, $size, $name) {
      $data['uploads'] = $this->model->get_list();
      $this->set($data);
       $data['create'] = $this->model->get_create();
      // if (!empty($_POST['content_area'])) {
       $fichier = $_POST['title']; // Nom du fichier 
       $file['name'] = $fichier;
       $file['id'] = $id;
       $file['size'] = $size;
       $ouverture = fopen("Assets/Newdoc/" .$fichier ,"w");
       if (!$this->model->check_name_create_modif($file['name'], $file['id'])) {
        copy (ROOT . "/Assets/Newdoc/" .$name, 
          ROOT . "/Assets/Newdoc/" .$fichier);
       $info = $this->model->update_create($file); // Création du nouveau fichier et ouverture du fichier avec le mode w on ouvre le fichier qu'en écriture et unlink devient inutile car le fichier est vidé automatiquement
       fwrite($ouverture,$_POST['register']); // ecriture
       fclose($ouverture); // fermeture du fichier
       $data['success'] = 'success';
       $data['name'] = $file['name'];
       $this->set($data);
       $this->render('createlist');
       // Affichage validation
        }
        else{
          $ouverture = file_get_contents("Assets/Newdoc/" .$name);
          $data['error2'] = 'error2';
          $data['name'] = $file['name'];
          $data['id'] = $id;
          $data['size'] = $size;
          $data['content'] = $ouverture;
          $this->set($data);
          $this->render('editcreate');
        }
       // echo getcwd();
     // }
   // }
      }
      public function export (){
        require(ROOT .'Assets/lib/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,$_POST['export']);
        $pdf->Output();

      }
      public function html () {
       $poids = 1000;
       $situation = "Assets/Newdoc/" .$_POST['hud'];
       $hide = str_replace(".mywac",".html",$_POST['hud'] );
     $fichier= $_POST['hud']; // Nom du fichier
     $ouverture = fopen("Assets/Newdoc/" .$hide ,"w"); // Création du nouveau fichier et ouverture du fichier avec le mode w on ouvre le fichier qu'en écriture et unlink devient inutile car le fichier est vidé automatiquement
     fwrite($ouverture,$_POST['html']); // ecriture
     fclose($ouverture); // fermeture du fichier
     header('Content-Type: text/html');
     header('Content-Length: '. $poids);
     header('Content-disposition: attachment; filename='. $hide);
     header('Pragma: no-cache');
     header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
     header('Expires: 0');
     readfile("Assets/Newdoc/" .$hide);
     exit();
     echo '<h2>modification effectuer</h2>';
   }
  // public function send_file(){
  //   $fichier = $_POST['content_area']; 
  //   $ouverture = file_get_contents("Assets/Uploads/" .$fichier);
  //   $data['fichier'] = $ouverture;
  //   $data['name'] = $fichier;
  //   $this->set($data);
  //   $this->render('index');
  // }

  // public function upload_file() {

  //   $dossier = 'Assets/Uploads/';
  //   $fichier = basename($_FILES['avatar']['name']);
  //       if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
  //       {
  //         header('Location: ' . WEBROOT . 'homes/index');
  //         exit;
  //       }
  //       else {

  //         echo "upload pas ok";
  //       }
  //     }
  //     public function send_file(){
  //       $fichier = $_POST['content_area']; 
  //       $ouverture = file_get_contents("Assets/Uploads/" .$fichier);
  //       $data['fichier'] = "bonjour";
  //       $this->set($data);
  //       $this->render('index');
  //     }
  //     public function modif_file($name) {
  //      $ouverture=fopen("$fichier","w"); // Création du nouveau fichier et ouverture du fichier avec le mode w on ouvre le fichier qu'en écriture et unlink devient inutile car le fichier est vidé automatiquement
  //      fwrite($ouverture,"$_POST[modif]"); // ecriture
  //      fclose($ouverture); // fermeture du fichier
  //      echo '<h2>Modification effectue</h2>'; // Affichage validation
  //      // echo getcwd();
  //      include_once(ROOT.'/views/index.php');
  //    }

 }