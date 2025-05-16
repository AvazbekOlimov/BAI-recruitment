<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax = false;
  public $messages = array();
  public $smtp = false;

  function add_message($content, $label = '', $length = 0) {
    $this->messages[] = "$label: $content";
  }

  function send() {
    $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
    $headers .= "Reply-To: {$this->from_email}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $message_body = implode("\n", $this->messages);

    if (mail($this->to, $this->subject, $message_body, $headers)) {
      return "Xabar yuborildi!";
    } else {
      http_response_code(500);
      return "Xatolik yuz berdi.";
    }
  }
}
?>
