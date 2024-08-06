<?php
$content= array(
    'short'=> 'New content',
    'regular'=>'This is the new content which has loaded by ajax',
    'long'=>'This is the new content which has loaded by ajax through dynamically'
);

echo json_encode($content);
//above we send json string but to make a  real json you have to parse it in ajax response json parse
?>