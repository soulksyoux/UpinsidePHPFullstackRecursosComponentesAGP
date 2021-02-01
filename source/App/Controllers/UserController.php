<?php


namespace Source\App\Controllers;


use Source\Core\Controller;
use Source\Support\Message;
use Source\Core\View;
use Source\Models\User;
use Source\Support\Pager;

/**
 * Class UserController
 * @package Source\App\Controllers
 */
class UserController extends Controller
{
    /**
     * @var View
     */
    private $template; //camada de visao

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->template = new View();
        $this->template->path("test", "test");
    }

    /**
     *
     */
    public function home()
    {
        echo "home";
        $getPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $total = db()->query("SELECT COUNT(id) as total FROM users")->fetch()->total;
        $pager = new Pager("?page=");
        $pager->pager($total, 5, $getPage, 2);

        echo $this->template->render("test::list", [
           "title" => "Usuário do sistema",
           "list" => (new User())->all($pager->limit(), $pager->offset()),
            "pager" => $pager->render()
        ]);
    }

    /**
     *
     */
    public function edit()
    {
        echo "editar";
        $getUser = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $user = ($getUser ? (new User())->findById($getUser) : null);

        if(!$user) {
            (new Message())->error("User não encontrado")->flash();
            header("location: ./");
            exit;
        }

        echo $this->template->render("test::user", [
            "user" => $user
        ]);

    }
}