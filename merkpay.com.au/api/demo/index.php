<?php

require 'loader.php';

require_once 'header.php';

echo getLogo();
echo getProducts();
echo getPaymentForm();
echo processForm();
echo getLoading();
// echo getResult();

require_once 'footer.php';