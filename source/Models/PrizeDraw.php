<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * PHP | Class Controller
 *
 * @author Murillo Araújo <murilloaraujog@gmail.com>
 * @package Source\Core
 */
class PrizeDraw extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("prize_draw", ["id_prize_draw"], ["the_amount", "date_prize_draw"]);
    }

    public function bootstrap($the_amount, $date_prize_draw): PrizeDraw
    {
        $this->the_amount = $the_amount;
        $this->date_prize_draw = $date_prize_draw;
       
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByDatePrizeDraw(string $date, string $columns = "*"): ?PrizeDraw
    {
        $find = $this->find("date_prize_draw = :date", "date={$date}", $columns);
        return $find->fetch();
    }

    /**
     * @return string
     */
    public function date_prize_draw(): string
    {
        return "{$this->date_prize_draw}";
    }

    /**
     * @return string
     */
    public function amount(): string
    {
        return "{$this->the_amount}";
    }

}