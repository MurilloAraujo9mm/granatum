<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Core\View;
use Source\Models\Auth;
use Source\Models\PrizeDraw;
use Source\Models\User;
use Source\Models\Withdraw;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::user()) {
            $this->message->error("Efetue login para acessar o painel admin.")->flash();
            redirect("/");
        }
    }

    /**
     * APP HOME
     */
    public function home(?array $data): void
    {

        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("dash", [
            "head" => $head,
            "prize_draw" => (new PrizeDraw())->find()->fetch(true)
        ]);
    }


   public function registerUser(?array $data): void
   {
        if (!empty($data)) {
            var_dump($data);
        }

        $head = $this->seo->render(
            "Cadastrar usuários " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("register-user", [
            "head" => $head,
           
        ]);
   }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function profile(?array $data): void
    {

        if (!empty($data["update"])) {
            $user = (new User())->findById("id_user", $this->user->id);
            $user->name = $data["name"];
            $user->mail = $data["email"];
            $user->password = $data["password"];


            if (!empty($_FILES["photo"])) {
                $file = $_FILES["photo"];
                $upload = new Upload();


                if ($this->user->photo()) {
                    (new Thumb())->flush("storage/{$this->user->photo}");
                    $upload->remove("storage/{$this->user->photo}");
                }

                if (!$user->photo = $upload->image($file, "{$user->name} {$user->name} " . time(), 360)) {
                    $json["message"] = $upload->message()->before("Ooops {$this->user->name}! ")->after(".")->render();
                    echo json_encode($json);
                    return;
                }
            }

            if (!$user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }

            $json["message"] = $this->message->success("Pronto {$this->user->first_name}. Seus dados foram atualizados com sucesso!")->render();
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("profile", [
            "head" => $head,
            "user" => $this->user,
            "photo" => ($this->user->photo() ? image($this->user->photo, 360, 360) :
                theme("/assets/images/avatar.jpg", CONF_VIEW_APP))
        ]);
    }

    /**
     * APP LOGOUT
     */
    public function logout(): void
    {
        $this->message->info("Saiu com sucesso " . Auth::user()->name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/");
    }
}
