/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as $ from 'jquery';
require('./bootstrap');
window.Vue = require('vue');
import 'select2';
import 'select2/dist/css/select2.min.css';
import 'datatables';
import 'datatables/media/css/jquery.dataTables.min.css'



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



import seisme from './components/seisme.vue';
import seismeUpdate from './components/seismeUpdate.vue';
import DrAgence from './components/DrAgence.vue';
import Construction from './components/Construction.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app1 = new Vue({
    el: '#app1',
    components : {seisme}
});
const app2 = new Vue({
    el: '#app2',
    components : {DrAgence}
});
const app3 = new Vue({
    el: '#app3',
    components : {seismeUpdate}
});
const app4 = new Vue({
    el: '#app4',
    components : {Construction}
});


$('.js-example-basic-multiple').select2({
    placeholder: "  Selectionner toutes les wilayas affectées par l'évènement",
    allowClear: true
});
$('.js-example-basic-multiple2').select2({
    placeholder: "  Selectionner les constructions à évaluer",
    allowClear: true
});
$('#myTable').DataTable({
    language: {
        // 'url' : 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json'
        // More languages : http://www.datatables.net/plug-ins/i18n/
        
            sProcessing: "Traitement en cours...",
            sSearch: "Rechercher&nbsp;:",
            sLengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            sInfo: "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            sInfoEmpty: "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
            sInfoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            sInfoPostFix: "",
            sLoadingRecords: "Chargement en cours...",
            sZeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            sEmptyTable: "Aucune donn&eacute;e disponible dans le tableau",
            oPaginate: {
            sFirst: "Premier",
            sPrevious: "Pr&eacute;c&eacute;dent",
            sNext: "Suivant",
            sLast: "Dernier"
            },
            oAria: {
            sSortAscending: ": activer pour trier la colonne par ordre croissant",
            sSortDescending: ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
            
    },
    aaSorting: []
});


