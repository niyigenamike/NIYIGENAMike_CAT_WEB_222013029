<?php
function generateCard($number, $text) {
echo '<li>';
echo" <i class='bx bxs-calendar-check' ></i>";
echo' <span class="text">';
echo'     <h3>'.$number.'</h3>';
echo'    <p>'.$text.'</p>';
echo' </span>';
echo'</li>';

}

?>