<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ["form", "auth"];
    protected $UserModel;
    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        helper(["rememberUser", "permLevelCheck", "scriptSaves", "randomPasswordGen"]);
        // Preload any models, libraries, etc, here.

        $this->UserModel = new \App\Models\UserModel;
        // Model for users.
        $this->ClassesModel = new \App\Models\getClasses;
        // Model for MailingTemplates
        $this->ClassesModerators = new \App\Models\getClassesModerators;
        // Model for 
        $this->UsersClassesModel = new \App\Models\getUsersClasses;
        // Model for 
        $this->StudentModel = new \App\Models\getStudents;
        // Model for 
        $this->getCharactersModel = new \App\Models\getCharacters;
        // Model for 
        $this->UserModel = new \App\Models\getUserLogin;
        // Model for 
        $this->MailingTemplates = new \App\Models\getMailingTemplates;
        // Model for 
        $this->RequestPasswordChangesModel = new \App\Models\getRequestPasswordChanges;
        // Model for 
        $this->StudyPathsModel = new \App\Models\getStudyPaths;
        // Model for 
        $this->QuestionModel = new \App\Models\getQuestion;
        // Model for 
        $this->getDnDClassesModel = new \App\Models\getDnDClasses;
        // Model for 
        $this->getDnDRacesModel = new \App\Models\getDnDRaces;
        // Model for 

        // E.g.: $this->session = \Config\Services::session();
    }
}
