<?php
/*

  Name : errorclass.php

  Purpose: This page is for creating functions for error message while handling exceptions 

  Developer: Haripriya

*/

/* original code starts */
class DbException extends Exception {
  #creating function errorMessage
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile();
    #passing 'errrormsg'
    return $errorMsg;
  }
  #creating function fileerror
  public function fileerror() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile().': <b>'.$this->getMessage().'File not uploaded';
    #passing 'errrormsg'
    return $errorMsg;
  }
  #creating function mailerror
  public function mailerror() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile().': <b>'.$this->getMessage();
    #passing 'errrormsg'
    return $errorMsg;
  }
}
?>