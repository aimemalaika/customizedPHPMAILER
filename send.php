<?php
spl_autoload_register('PHPMailerAutoload', true, true);
       
spl_autoload_register(function($class){
    require_once $class.'php';
});

$message = '<div> <div styel="" style="width: 100%;background: rgb(58, 63, 81);padding:15px 20px;"> <p style="color: #fff;font-size: 25px;font-weight: bold;font-family: arial;margin: 0 15% 0 13%;">'.APPNAME.'</p></div><div style="width: 70%;margin: 0 15%;"> <h3 style="font-family: arial;font-size: 19px;color: gray;"> Account creation on '.APPNAME.' </h3> <p style="font-family: arial;font-size: 19px;color: gray;">Dear '.cleanInput(Input::get('first_name')).' '.cleanInput(Input::get('last_name')).', </p><p style="font-family: arial;font-size: 19px;color: gray;">Thank you for using '.APPNAME.', the registration Application.</p><p style="font-family: arial;font-size: 19px;color: gray;">Let us know if you have any questions or facing any issues using Registration system. we would be happy to help you. </p><p style="font-family: arial;font-size: 19px;color: gray;">The '.APPNAME.' Team</p></div></div>';
$messageSender = new ReflectionMethod('Responder', 'sendMessage');
$messageSender->setAccessible(true);
$messageSender->invoke(new Responder(),
        array(
            'name' =>  APPNAME,
            'email' => 'registration@eventsfactory.rw'),
        array(
            array(
                'name' => cleanInput(Input::get('first_name')).' '.cleanInput(Input::get('last_name')),
                'email' => cleanInput(Input::get('email'))
            ),
        ),
        'Account creation',
        $message
);

?>