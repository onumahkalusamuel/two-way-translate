<?php

require_once ('vendor/autoload.php');
require_once ('strCompare.php');

use \Statickidz\GoogleTranslate;

$source = 'en';
$target = 'fr';
$text = 'I love Jesus. He is my all in all. I could have gone worse, but for His grace, I am saved. I am not afraid, what man can do to me, because I trust in His Redeeming Blood.';
$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);

$result2 = $trans->translate($target, $source, $result);


$coagula = new StringCompare($text, $result2, 
        array(
            'remove_html_tags' => false,
            'remove_extra_spaces' => true,
            'remove_punctuation' => true,
            'punctuation_symbols' => Array('.', ',')
            )
);

$comp = similar_text($result2, $text, $perc);

$out = ["$text", "$result", "$result2", "$comp", "$perc"];

print_r($out);

echo "<br/><br/><br/>";

print_r($coagula->getSimilarityPercentage());