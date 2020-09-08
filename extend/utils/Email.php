<?php
namespace utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    protected $mail = null;

    protected $isHtml = true;

    /**
     * Email constructor.
     * @throws \PHPMailer\PHPMailer\Exception
     */
    function __construct($option = [])
    {
        $this->mail = new PHPMailer();
        //Server settings
        $this->mail->SMTPDebug = 0;
        $this->mail->isSMTP();
        $this->mail->Host       = $option['smtp'];
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $option['user'];
        $this->mail->Password   = $option['pass'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = $option['port'];
        //Recipients
        $this->mail->setFrom($option['user'], $option['from']);
        $this->mail->isHTML($this->isHtml);
    }

    /**
     * @param $address
     * @param string $name
     * @return $this
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function addAddress($address, $name= '')
    {
        $this->mail->addAddress($address, $name);
        return $this;
    }

    /**
     * @param null $title
     * @param null $body
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send($title = null, $body = null)
    {
        $a = $this->mail->send();
        return $a;
    }

    /**
     * @param $string
     * @return $this
     */
    public function subject($string)
    {
        $this->mail->Subject = $string;
        return $this;
    }

    /**
     * @param $content
     * @return $this
     */
    public function body($content)
    {
        $this->mail->Body = $content;
        return $this;
    }

    /**
     * @param $path
     * @param string $name
     * @return $this
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function addAttachment($path, $name = '')
    {
        $this->mail->addAttachment($path, $name);
        return $this;
    }

    /**
     * @param bool $bool
     * @return $this
     */
    public function isHtml($bool = true)
    {
        $this->mail->isHTML($bool);
        return $this;
    }
}
