<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * PHP | Class Controller
 *
 * @author Murillo Araújo <murilloaraujog@gmail.com>
 * @package Source\Core
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id_user"], ["first_name", "last_name", "mail", "password"]);
    }

    public function bootstrap($first_name, $last_name, $mail, $password): User
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->mail = $mail;
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("mail = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return "{$this->name}";
    }

    /**
     * @return string
     */
    public function mail(): string
    {
        return "{$this->mail}";
    }

    /**
     * @return string|null
     */
    public function photo(): ?string
    {
        return $this->photo;
    }
    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, email e senha são obrigatórios");
            return false;
        }

        if (!is_email($this->mail)) {
            $this->message->warning("O e-mail informado não tem um formato válido");
            return false;
        }

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("mail = :e AND id_user != :i", "e={$this->mail}&i={$userId}", "id_user")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id_user = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByEmail($this->mail, "id_user")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $userId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById("id_user", $userId))->data();
        return true;
    }
}