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
 
   
  public function newPatent($author, $content, $title) {
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
  
  public function getPatentStatus($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    }
    $tempStatus = explode("{|}", file_get_contents("protected/brevetti/$id"));
    return $tempStatus[3];
  }
  
  public function setPatentStatus($id, $status) {
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
    if ($this->getPatentStatus($id) === $id) {
      return 200;
    } else {
      return 500;
    }
  }
  
  public function getPatent($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    } else {
      return explode("{|}", file_get_contents("protected/brevetti/$id"));
    }
  }
  
  public function deletePatent($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    } else {
      if (unlink("protected/brevetti/$id")) {
        return 200;
      } else {
        return 505;
      }
    }
  }
  
  public function setPatentToPublicDomain($id) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    }
    
    $brevetto = explode("{|}", file_get_contents("protected/brevetti/$id"));
    $newSubString = 'guest{|}' . $brevetto[1] . '{|}' . $brevetto[2] . '{|}' . $brevetto[3] . '{|}' . $brevetto[4];
    file_put_contents("protected/brevetti/$id", $newSubString);
    if ($this->getPatent($id)[0] === 'guest') {
      return 200;
    } else {
      return 500;
    }
  }
  
  public function setPatentOwnerToASpecificUser($id, $user) {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $user = filter_var($user, FILTER_SANITIZE_STRING);
    if (!file_exists("protected/brevetti/$id")) {
      return 502;
    }
    if (!$this->checkValidStringFormat($user)) {
      return 501;
    }
    $brevetto = explode("{|}", file_get_contents("protected/brevetti/$id"));
    $newSubString = $user . '{|}' . $brevetto[1] . '{|}' . $brevetto[2] . '{|}' . $brevetto[3] . '{|}' . $brevetto[4];
    file_put_contents("protected/brevetti/$id", $newSubString);
    if ($this->getPatent($id)[0] === $user) {
      return 200;
    } else {
      return 500;
    }
  }
  
  public function loadStatusColor() {
    $do = array(
      [
      "0" => "yellow",
      "1" => "green",
      "2" => "red",
      "3" => "lime"
      ]
    );
    return $do;
  }
}
