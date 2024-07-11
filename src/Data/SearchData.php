<?php


namespace App\Data;

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
   * @var Departement[]
   */
  public $departement = [];

}