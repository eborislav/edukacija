<?php
/**
 * Created by PhpStorm.
 * User: dot
 * Date: 2.1.2017.
 * Time: 13.27
 */

namespace AppBundle\Entity;


class Form_upisi_zad
{
    protected $task;
    //  protected $dueDate;
    protected $rbzad;
    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getRbzad()
    {
        return $this->rbzad;
    }

    /**
     * @param mixed $rbzad
     */
    public function setRbzad($rbzad)
    {
        $this->rbzad = $rbzad;
    }

   // public function getDueDate()
    //  {
    //      return $this->dueDate;
    //  }

    // public function setDueDate(\DateTime $dueDate = null)
    //  {
    //      $this->dueDate = $dueDate;
    //  }

}