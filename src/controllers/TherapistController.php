<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../models/Therapist.php';
require_once __DIR__.'/../repository/TherapistRepository.php';
class TherapistController extends AppController
{
    private $messages = [];
    private $therapistRepository;
    public function __construct()
    {
        parent::__construct();
        $this->therapistRepository = new TherapistRepository();
    }
    public function getTherapist(string $email): ?Therapist{
    $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.therapist inner join "user" u on u.id = therapist.id where email= :email ');
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return new Therapist(
        $user['name'],
        $user['surname'],
        $user['photo'],
        $user['specialization'],
        $user['account_number'],
        $user['hourly_rate'],
        $user['phone'],
        $user['email'],
        $user['password']
    );
    }
    public function addTherapist(){
        if($this->isPost() && is_uploaded_file($_FILES['photo']['tmp_name']) && $this->validate_photo($_FILES['photo'])){
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['photo']['name']
            );

            $therapist = new Therapist($_POST['name'],
                $_POST['surname'],
                $_FILES['photo']['name'],
                $_POST['specialization'],
                $_POST['account-number'],
                $_POST['hourly-rate'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['password']);
            $this->therapistRepository->addTherapist($therapist);
            return $this->render('myprofile', ['messages'=>$this->messages,'therapist'=>$therapist]);
        }
        $this->render('add_therapist_form', ['messages'=>$this->messages]);
    }
    public function searchTherapist()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->therapistRepository->getTherapistByName($decoded['search']));
        }
    }

    public function therapists()
    {
        $allTherapists = $this->therapistRepository->getTherapists();
        $this->render('searchfor', ['messages' => ['terapeute', 'terapeuty'],'users'=>$allTherapists]);
    }

}