<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite3a9d67c2f4e7d28d7df56fb1a2d85a4
{
    public static $files = array (
        '9c9a81795c809f4710dd20bec1e349df' => __DIR__ . '/..' . '/joshcam/mysqli-database-class/MysqliDb.php',
        '94df122b6b32ca0be78d482c26e5ce00' => __DIR__ . '/..' . '/joshcam/mysqli-database-class/dbObject.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Clickatell\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Clickatell\\' => 
        array (
            0 => __DIR__ . '/..' . '/arcturial/clickatell/src',
            1 => __DIR__ . '/..' . '/arcturial/clickatell/test',
        ),
    );

    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'Ideea\\Unicode' => 
            array (
                0 => __DIR__ . '/..' . '/ideea/unicode/src',
            ),
        ),
        'C' => 
        array (
            'Curl' => 
            array (
                0 => __DIR__ . '/..' . '/curl/curl/src',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite3a9d67c2f4e7d28d7df56fb1a2d85a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite3a9d67c2f4e7d28d7df56fb1a2d85a4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite3a9d67c2f4e7d28d7df56fb1a2d85a4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite3a9d67c2f4e7d28d7df56fb1a2d85a4::$classMap;

        }, null, ClassLoader::class);
    }
}
