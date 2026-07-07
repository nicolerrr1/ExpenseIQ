import '../css/app.css';
import './bootstrap';
import './reports';

import Chart from 'chart.js/auto';

window.Chart = Chart;

console.log("APP JS LOADED");
console.log(typeof window.openModal);
console.log(window.Chart);

window.openModal = function(id) {

    document.getElementById(id).classList.remove('hidden');

}

window.closeModal = function(id) {

    document.getElementById(id).classList.add('hidden');

}