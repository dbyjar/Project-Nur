<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    
    protected $_ci;
    protected $email_pengirim = ''; // Isikan dengan email pengirim
    protected $nama_pengirim = ''; // Isikan dengan nama pengirim
    protected $password = ''; // Isikan dengan password email pengirim

    public function __construct() {
        // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        $this->_ci = &get_instance();

        require_once(FCPATH . 'assets/phpmailer/Exception.php');
        require_once(FCPATH . 'assets/phpmailer/PHPMailer.php');
        require_once(FCPATH . 'assets/phpmailer/SMTP.php');
    }

    public function send($data) {

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $this->email_pengirim; // Email Pengirim
        $mail->Password = $this->password; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['content'];

        $send = $mail->send();

        if($send) { // Jika Email berhasil dikirim
            $response = array('status'=>'Sukses', 'message'=>'Email berhasil dikirim');
        } else { // Jika Email Gagal dikirim
            $response = array('status'=>'Gagal', 'message'=>'Email gagal dikirim');
        }

        return $response;
    }
}
