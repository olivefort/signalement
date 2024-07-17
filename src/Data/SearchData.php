<?php


namespace App\Data;

use App\Entity\Alert;

class SearchData
{
 /**
  * @var string
  */
  public $field = '';

  /**
   * @var null|integer
   */
  public $dateMax;

  /**
   * @var null|integer
   */
  public $dateMin;
  
  /**
   * @var boolean
   */
  public $cloture = false;
  
  /**
   * @var Alert[]
   */
  public $departement = [];

}