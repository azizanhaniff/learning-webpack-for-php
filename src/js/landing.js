import './bootstrap.js';

import '../css/landing.css';

import Erina from '../img/Erina.png';

$(function() {
    $("form").submit(function(event) {
        event.preventDefault();
    });
});

$("[alt='Erina']").attr("src", Erina);
