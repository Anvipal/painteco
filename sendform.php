<?php
include_once('_config.inc.php');

include_once(PATH_SITE . 'includes.php');
include_once(PATH_SITE . 'inc/init_site.inc');

$mailSendTo = 'info@painteco.eu';

if (isset($_POST['what'])) {
    switch ($_POST['what']) {
        case 'izbraukuma_konsultacija':

            $f = new FormCheck();

            $f->set(
                'name_surname',
                isset($_POST['name_surname']) ? $_POST['name_surname'] : '',
                array(FormCheck::TRIM_FILTER, FormCheck::NO_HTML_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 100)))
            );

            $f->set(
                'email',
                isset($_POST['email']) ? $_POST['email'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, FormCheck::EMAIL_VALIDATOR)
            );

            $f->set(
                'phone',
                isset($_POST['phone']) ? $_POST['phone'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, FormCheck::PHONE_VALIDATOR)
            );

            $f->set(
                'object_address',
                isset($_POST['object_address']) ? $_POST['object_address'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 250)))
            );

            $f->set(
                'description',
                isset($_POST['description']) ? $_POST['description'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 500)))
            );

            $response = array();

            $isFormValid = $f->isValid();
            $response['is_valid'] = $isFormValid;
            $response['error_message'] = !$isFormValid ? _get_vars('Please check a form') : '';
            $response['success_message'] = $isFormValid ? _get_vars('Thanks! Your request is received.') : '';

            $response['field'] = array();
            $list = $f->getAll();
            foreach ($list as $property) {

                $response['field'][$property['property']] = array(
                    'is_valid' => $property['is_valid'],
                    'error_message' => $property['error_message'],
                );
            }

            $body = '';
            if ($isFormValid) {
                $body .= "<strong>" . _get_vars("label_name_surname") . "</strong>";
                $body .= "<br/>";
                $body .= $list['name_surname']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_email") . "</strong>";
                $body .= "<br/>";
                $body .= $list['email']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_phone") . "</strong>";
                $body .= "<br/>";
                $body .= $list['phone']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_object_address") . "</strong>";
                $body .= "<br/>";
                $body .= $list['object_address']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_description") . "</strong>";
                $body .= "<br/>";
                $body .= nl2br($list['description']['value']);

                $to      = $mailSendTo;
                $subject = '=?UTF-8?B?'.base64_encode("[painteco.eu] - " . _get_vars("izbraukuma_konsultacija_link") . " - " . $list['name_surname']['value']).'?=';
                $message = $body;
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: info@painteco.com' . "\r\n" .
                    'Reply-To: ' . $mailSendTo . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);

//                sendMail(
//                    'info@painteco.eu',
//                    $list['name_surname']['value'],
//                    'info@painteco.eu',
//                    "[painteco.eu] - " . _get_vars("izbraukuma_konsultacija_link"),
//                    $body
//                );
            }

            echo json_encode($response);

            break;

        case 'sazinies_ar_mums':

            $f = new FormCheck();

            $f->set(
                'name_surname',
                isset($_POST['name_surname']) ? $_POST['name_surname'] : '',
                array(FormCheck::TRIM_FILTER, FormCheck::NO_HTML_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 100)))
            );

            $f->set(
                'theme',
                isset($_POST['theme']) ? $_POST['theme'] : '',
                array(FormCheck::TRIM_FILTER, FormCheck::NO_HTML_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR)
            );

            $f->set(
                'email',
                isset($_POST['email']) ? $_POST['email'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, FormCheck::EMAIL_VALIDATOR)
            );

            $f->set(
                'phone',
                isset($_POST['phone']) ? $_POST['phone'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, FormCheck::PHONE_VALIDATOR)
            );

            $f->set(
                'question',
                isset($_POST['question']) ? $_POST['question'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 500)))
            );

            $f->set(
                'answer_by',
                isset($_POST['question']) ? $_POST['answer_by'] : '',
                array(FormCheck::TRIM_FILTER),
                array(FormCheck::REQUIRED_VALIDATOR, array(FormCheck::BETWEEN_VALIDATOR => array('min' => 1, 'max' => 100)))
            );

            $response = array();

            $isFormValid = $f->isValid();
            $response['is_valid'] = $isFormValid;
            $response['error_message'] = !$isFormValid ? _get_vars('Please check a form') : '';
            $response['success_message'] = $isFormValid ? _get_vars('Thanks! Your request is received.') : '';

            $response['field'] = array();
            $list = $f->getAll();
            foreach ($list as $property) {

                $response['field'][$property['property']] = array(
                    'is_valid' => $property['is_valid'],
                    'error_message' => $property['error_message'],
                );
            }

            $body = '';
            if ($isFormValid) {
                $body .= "<strong>" . _get_vars("label_name_surname") . "</strong>";
                $body .= "<br/>";
                $body .= $list['name_surname']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_theme") . "</strong>";
                $body .= "<br/>";
                $body .= $list['theme']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_email") . "</strong>";
                $body .= "<br/>";
                $body .= $list['email']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_phone") . "</strong>";
                $body .= "<br/>";
                $body .= $list['phone']['value'];
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_question") . "</strong>";
                $body .= "<br/>";
                $body .= nl2br($list['question']['value']);
                $body .= "<br/><br/>";

                $body .= "<strong>" . _get_vars("label_answer_by") . "</strong>";
                $body .= "<br/>";
                $body .= nl2br($list['answer_by']['value']);


                $to      = $mailSendTo;
                $subject = '=?UTF-8?B?'.base64_encode("[painteco.eu] - " . _get_vars("sazinies_ar_mums_link") . " - " . $list['name_surname']['value']).'?=';
                $message = $body;
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: info@painteco.com' . "\r\n" .
                    'Reply-To: ' . $mailSendTo . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);

//                sendMail(
//                    'info@painteco.eu',
//                    $list['name_surname']['value'],
//                    'info@painteco.eu',
//                    "[painteco.eu] - " . _get_vars("sazinies_ar_mums_link"),
//                    $body
//                );
            }

            echo json_encode($response);

            break;
    }
}


class FormCheck
{
    /**
     * @var array
     * Property value list
     */
    private $data;

    /**
     * @var
     * Whether form is valid
     */
    protected $isValid;

    /**
     *
     */
    const TRIM_FILTER = 'trim';
    const NO_HTML_FILTER = 'no_html';

    const REQUIRED_VALIDATOR = 'notEmpty';
    const EMAIL_VALIDATOR = 'email';
    const PHONE_VALIDATOR = 'phone';
    const IS_IN_LIST_VALIDATOR = 'inList';
    const BETWEEN_VALIDATOR = 'between';

    static public $knownValidators = array(
        self::REQUIRED_VALIDATOR,
        self::EMAIL_VALIDATOR,
        self::PHONE_VALIDATOR,
        self::IS_IN_LIST_VALIDATOR,
        self::BETWEEN_VALIDATOR,
    );

    /**
     * @param $propertyKey
     * @param $value
     * @param $filters
     * @param $validators
     */
    public function set($propertyKey, $value, $filters, $validators)
    {
        $this->data[$propertyKey] = array(
            'property'          => $propertyKey,
            'value'             => $this->filterValue($value, $filters),
            'validators'        => is_string($validators) ? array($validators) : $validators,
            'is_valid'          => null,
            'error_message'     => null,
        );
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * @param $property
     * @return mixed
     * @throws Exception
     */
    public function get($property)
    {
        if ($this->isValid === null) {
            throw new \Exception ('Not available, until form isValid will be executed');
        }
        if (!isset($this->data[$property])) {
            throw new \Exception ('Such property does not exists');
        }

        return $this->data[$property];
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        //$this->isValid = false;
        foreach ($this->data as $propertyKey => $property) {

            $this->validate($propertyKey);

            if ($this->data[$propertyKey]['is_valid'] === false) {
                $this->isValid = false;
            }
        }

        if ($this->isValid === null) {
            $this->isValid = true;
        }

        return $this->isValid;
    }

    /**
     *
     */
    protected function filterValue($value, $filters)
    {
        $filteredValue = $value;

        if (!is_array($filters)) {
            $filters = array($filters);
        }

        foreach ($filters as $filter) {
            switch ($filter) {
                case (static::TRIM_FILTER):
                    $filteredValue = trim($value);
                    break;
                case (static::NO_HTML_FILTER):
                    $filteredValue = $value;
                    break;
                default:
                    throw new \Exception('Unknown filter is passed');
            }
        }

        return $filteredValue;
    }

    /**
     * @param $property
     * @throws Exception
     */
    protected function validate($propertyKey)
    {
        foreach ($this->data[$propertyKey]['validators'] as $validator) {
            if ($this->data[$propertyKey]['is_valid']===false) {
                break;
            }

            $method = is_array($validator) ? array_pop(array_keys($validator)) : $validator;
            $args = is_array($validator) ? $validator[$method] : array();

            if (!in_array($method, static::$knownValidators)) {
                throw new \Exception('Unknown validator');
            }

            $args = array_values($args);

            switch (count($args)) {
                case 0:
                    $this->{$method}($propertyKey);
                    break;
                case 1:
                    $this->{$method}($propertyKey, $args[0]);
                    break;
                case 2:
                    $this->{$method}($propertyKey, $args[0], $args[1]);
                    break;
                case 3:
                    $this->{$method}($propertyKey, $args[0], $args[1], $args[2]);
                    break;
                case 4:
                    $this->{$method}($propertyKey, $args[0], $args[1], $args[2], $args[3]);
                    break;
            }
        }
    }

    /**
     * @param $propertyKey
     */
    public function notEmpty($propertyKey) {
        if ($this->data[$propertyKey]['value'] === '') {
            $this->data[$propertyKey]['is_valid'] = false;
            $this->data[$propertyKey]['error_message'] = _get_vars('Field is mandatory');
        }
    }

    /**
     * @param $propertyKey
     * @param $min
     * @param $max
     */
    public function between($propertyKey, $min, $max)
    {
        $length = mb_strlen($this->data[$propertyKey]['value'], 'UTF-8');
        if (!($length >= $min && $length <= $max)) {
            $this->data[$propertyKey]['is_valid'] = false;
            $this->data[$propertyKey]['error_message'] = sprintf(_get_vars('Length is limited  by %s symbols'), $max);
        }
    }

    /**
     * @param $propertyKey
     */
    public function email($propertyKey)
    {
        if(!filter_var($this->data[$propertyKey]['value'], FILTER_VALIDATE_EMAIL)) {
            $this->data[$propertyKey]['is_valid'] = false;
            $this->data[$propertyKey]['error_message'] = _get_vars('Email is invalid');
        }
    }

    /**
     * @param $phone
     */
    public function phone($propertyKey)
    {
        if( !preg_match("/^[\+]?[0-9 ]{6,30}$/i", $this->data[$propertyKey]['value']) ) {
            $this->data[$propertyKey]['is_valid'] = false;
            $this->data[$propertyKey]['error_message'] = _get_vars('Phone is invalid');
        }
    }
}


/**
 * Utility to send emails with attachments
 * taken from comments from www.php.net.
 */
function sendMail($emailaddress, $fromname, $fromaddress, $emailsubject, $body, $version='html', $attachments=false) {

    $eol="\r\n";
    $mime_boundary=md5(time());
    $now='';

    # Common Headers
    $headers  = 'From: '.$fromname.'<'.$fromaddress.'>'.$eol;
    $headers .= 'Reply-To: '.$fromname.'<'.$fromaddress.'>'.$eol;
    $headers .= 'Return-Path: '.$fromname.'<'.$fromaddress.'>'.$eol;    // these two to set reply address
    //$headers .= "Message-ID: <".$now." ".$fromaddress.">".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters

    # Boundry for marking the split & Multitype Headers
    $headers .= 'MIME-Version: 1.0'.$eol;
    $headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol;

    $msg = "";

    if ($attachments !== false)	{

        for($i=0; $i < count($attachments); $i++) {
            if (is_file($attachments[$i]["file"])) {
                # File for Attachment
                $file_name = substr($attachments[$i]["file"], (strrpos($attachments[$i]["file"], "/")+1));

                $handle=fopen($attachments[$i]["file"], 'rb');
                $f_contents=fread($handle, filesize($attachments[$i]["file"]));
                $f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
                fclose($handle);

                # Attachment
                $msg .= "--".$mime_boundary.$eol;
                $msg .= "Content-Type: ".$attachments[$i]["content_type"]."; name=\"".$file_name."\"".$eol;
                $msg .= "Content-Transfer-Encoding: base64".$eol;
                $msg .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol.$eol; // !! This line needs TWO end of lines !! IMPORTANT !!
                $msg .= $f_contents.$eol.$eol;

            }
        }
    }

    # Setup for text OR html
    $msg .= "Content-Type: multipart/alternative".$eol;

    # Text Version
    if ($version == 'text') {
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: text/plain; charset=utf-8".$eol;
        $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
        $msg .= strip_tags(str_replace("<br>", "\n", $body)).$eol.$eol;
    } else {
        # HTML Version
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: text/html; charset=utf-8".$eol;
        $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
        $msg .= $body.$eol.$eol;
    }

    # Finished
    $msg .= "--".$mime_boundary."--".$eol.$eol;  // finish with two eol's for better security. see Injection.


    # SEND THE EMAIL
    @ini_set('sendmail_from',$fromaddress);  // the INI lines are to force the From Address to be used !
    mail($emailaddress, '=?UTF-8?B?'.base64_encode($emailsubject).'?=', $msg, $headers, "-f".$fromaddress);
    @ini_restore('sendmail_from');
}