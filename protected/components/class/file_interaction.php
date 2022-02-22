<?php
namespace Brevetti;

class FileGo {
  
  public function checkValidStringFormat($string) {
    if (stripos($string, "{|}") !== false) {
      return false;
    } else {
      return true;
    }
  }
 
   
  public function newLicense($author, $content, $title) {
    $content = filter_var($content, FILTER_SANITIZE_STRING);
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $author = filter_var($title, FILTER_SANITIZE_STRING);
    $id = rand(1000000000, 9999999997);
    if (!$this->checkValidStringFormat($content) && !$this->checkValidStringFormat($title) && !$this->checkValidStringFormat($author)) {
      return 501;
    }
    $brevetto = $author . '{|}' strtotime("now") . '{|}' . $title . '{|}' . $content . '{|}0';
    if (!file_exists("protected/brevetti/$id")) {
       file_put_contents("protected/brevetti/$id", $brevetto);
       return 200;
    } else {
       return 500;
    }
  }
  
  public function getLicenseStatus($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    }
    $tempStatus = explode("{|}", file_get_contents("protected/brevetti/$id"));
    return $tempStatus[3];
  }
  
  public function setLicenseStatus($id, $status) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $status = filter_var($status, FILTER_SANITIZE_NUMBER_INT);
    // 0 = in approvazione; 1 = approvato; 2 = negato; 3 = scaduto (teoricamente messo in automatico dal server
    if ($status !== 0 && $status !== 1 && $status !== 2 && $status !== 3) {
      return 501;
    }    
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    }
    // Ok, l'input è valido, modifico il file
    $brevetto = explode("{|}", file_get_contents("protected/brevetti/$id"));
    $newSubString = $brevetto[0] . '{|}' . $brevetto[1] . '{|}' . $brevetto[2] . '{|}' . $brevetto[3] . '{|}' . $status;
    file_put_contents("protected/brevetti/$id", $newSubString);
    if ($this->getLicenseStatus($id) === $id) {
      return 200;
    } else {
      return 500;
    }
  }
  
  public function getLicense($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    } else {
      return explode("{|}", file_get_contents("protected/brevetti/$id"));
    }
  }
  
  
    
