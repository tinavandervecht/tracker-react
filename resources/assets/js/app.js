/* ---- Global Requirements ---- */
import React from 'react';
import ReactDOM from 'react-dom';

/* ---- ReactJS Components ---- */
import BillList from './components/BillList';

/* ---- Initialize ReactJS Components ---- */
if ($('#bills-list').length) {
    const bills = $('#bills-list').data('bills');
    const listType = $('#bills-list').data('list-type')
        ? $('#bills-list').data('list-type')
        : null;

    ReactDOM.render(<BillList bills={bills} listType={listType}/>, document.getElementById('bills-list'));
}

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('.form-control').on('change', function() {
        if ($(this).val().length) {
            $(this).addClass('populated');
        } else {
            $(this).removeClass('populated');
        }
    });

    if ($('.disable-on-submit').length) {
        $('.disable-on-submit').each(function() {
            $(this).submit(function(){
                $(this).find('button[type=submit]').prop('disabled', true);
                $(this).find('button[type=submit]').html('Processing...');
                $(this).find('button[type=submit]').addClass('disabled');
            })
        })
    }
})
