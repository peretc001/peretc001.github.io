<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#(.+?)\\.html(.*)#',
    'RULE' => '$1.php$2',
    'ID' => '',
    'PATH' => '',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
